<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class CartsController extends Controller
{

    public function addToCart(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|integer',
            'produit_id' => 'required|integer',
            'quantite' => 'required|integer|min:1',
            'prix_unitaire' => 'required|numeric',
        ]);

        DB::table('paniers')->insert([
            'user_id' => $validated['user_id'],
            'produit_id' => $validated['produit_id'],
            'quantite' => $validated['quantite'],
            'statut' => $request->statut,
            'prix_unitaire' => $validated['prix_unitaire'],
            'created_at' => now(),
        ]);

        return response()->json(["message" => "Produit ajouté au panier"], 200);
    }


    public function get_panier(Request $request, $id)
    {
        // 🔐 Récupère automatiquement l'utilisateur grâce à Sanctum
        $user = $request->user();

        if (!$user) {
            return response()->json([
                'message' => 'Utilisateur non authentifié.',
            ], 401);
        }


        if ($user->id != $id) {
            return response()->json([
                'message' => 'Accès refusé au panier demandé.',
            ], 403);
        }

        // 🧺 Récupérer le panier
        $paniers = DB::table('paniers')
            ->join('users', 'paniers.user_id', '=', 'users.id')
            ->join('medicaments', 'paniers.produit_id', '=', 'medicaments.idmedicament')
            ->where('users.id', $id)
            ->where('statut', 1)
            ->get();

        return response()->json([
            'user' => $user,
            'panier' => $paniers,
        ],200);
    }

    public function store(Request $request)
    {
        $user = $request->user();

        if (!$user) {
            return response()->json(['message' => 'Utilisateur non authentifié.'], 401);
        }

        // 🧠 Exemple d’ajout d’un article au panier
        $validated = $request->validate([
            'produit_id' => 'required|integer',
            'quantite' => 'required|integer|min:1',
        ]);

        $panier = $user->paniers()->create($validated);

        return response()->json([
            'message' => 'Produit ajouté au panier avec succès.',
            'panier' => $panier
        ]);
    }

     public function delete_from_cart(Request $request)
    {
        DB::table('paniers')
            ->where('idpanier', $request->produitId)->where('user_id', $request->userId)
            ->delete();

        return response()->json(["message" => "Produit supprimé du panier"], 200);
    }


    public function delete_all(Request $request)
    {
        DB::table('paniers')
            ->where('user_id', $request->userId)->where('statut', 1)
            ->delete();

        return response()->json(["message" => "Produit supprimé du panier"], 200);
    }



    public function validerPanier(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|integer',
            'produits' => 'required|array',
            'produits.*.panier_id' => 'required|integer',
            'produits.*.produitID' => 'required|integer',
            'produits.*.quantite' => 'required|integer|min:1',
            'produits.*.prix_unitaire' => 'required|string',
            'notes' => 'nullable|string',
            'statut' => 'nullable|string',
        ]);

        // ✅ Récupérer tous les panier_id depuis le tableau produits
        $panierIds = collect($validated['produits'])->pluck('panier_id')->toArray();
        
        $IDcommande = DB::table('commandes')->insertGetId([
            'panier_id' => json_encode($panierIds), // on stocke tous les ID du panier en JSON
            'numerocommande'=>'CMD'.date('Ys').'-'.date('si'),
            'notes' => $validated['notes'] ?? null,
            'statut' => $validated['statut'],
            'created_at' => now(),
        ]);
        foreach ($validated['produits'] as $p) {
            DB::table('paniers')->where('idpanier', $p['panier_id'])->where('user_id', $validated['user_id'])
            ->update([
                'produit_id' => $p['produitID'],
                'quantite' => $p['quantite'],
                'prix_unitaire' => $p['prix_unitaire'],
                'statut' => 2,
                'notes' => $validated['notes'] ?? null,
                'id_commande'=>$IDcommande,
                'updated_at' => now(),
            ]);

        }

        return response()->json([
            'success' => true,
            'message' => 'Commande enregistrée avec succès',
        ]);
    }


    public function suivicommande(Request $request, $id, $idcommande, $numerocommande)
    {
        dd($id, $idcommande, $numerocommande);
        
        $suivicommandes = DB::table('paniers')
            ->join('commandes', 'paniers.idpanier', '=', 'commandes.idcommande')
            ->join('users', 'paniers.user_id', '=', 'users.id')
            ->join('medicaments', 'paniers.produit_id', '=', 'medicaments.idmedicament')
            ->where('users.id', $request->user()->id)
            ->where('paniers.statut', 2)
            ->where('commandes.idcommande', $idcommande)
            ->where('commandes.numerocommande', $numerocommande)
            ->select('commandes.statut')
            ->get(); // ✅ retourne un seul résultat
        dd($suivicommandes);
        return response()->json([
            'suivicommandes' => $suivicommandes ? $suivicommandes->statut : 'en_attente',
        ], 200);
    }


    public function historycommande(Request $request)
    {
        $historycommandes = DB::table('paniers')
            ->join('commandes', 'paniers.idpanier', '=', 'commandes.idcommande')
            ->join('users', 'paniers.user_id', '=', 'users.id')
            ->join('medicaments', 'paniers.produit_id', '=', 'medicaments.idmedicament')
            ->where('users.id', $request->user()->id)
            ->select(
                'users.id as user_id',
                'commandes.statut',
                'commandes.idcommande',
                'numerocommande',
                'commandes.created_at',
                'medicaments.nom',
                'paniers.prix_unitaire',
                'medicaments.images',
                'paniers.quantite'
            )
            ->get();

        // dd($historycommandes);

        return response()->json([
            'historycommandes' => $historycommandes,
        ], 200);

    }


    public function detailHistory(Request $request)
    {
        $DetailHistroy = DB::table('paniers')
            ->join('commandes', 'paniers.idpanier', '=', 'commandes.idcommande')
            ->join('users', 'paniers.user_id', '=', 'users.id')
            ->join('medicaments', 'paniers.produit_id', '=', 'medicaments.idmedicament')
            ->where('users.id', $request->user()->id)
            ->where('paniers.statut', 2)
            ->where('commandes.idcommande', $request->idcommande)
            ->where('commandes.numerocommande', $request->numerocommande)
            ->select(
                'users.id as user_id',
                'commandes.statut',
                'commandes.idcommande',
                'numerocommande',
                'commandes.created_at',
                'medicaments.nom',
                'paniers.prix_unitaire',
                'medicaments.images',
                'paniers.quantite'
            )
            ->get();

        // dd($historycommandes);

        return response()->json([
            'detailhistory' => $DetailHistroy,
        ], 200);
    }


    


    // numeroCommande
}
