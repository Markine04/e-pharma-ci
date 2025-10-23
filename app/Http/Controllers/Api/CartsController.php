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
            'statut' => $validated['statut'],
            'prix_unitaire' => $validated['prix_unitaire'],
            'created_at' => now(),
        ]);

        return response()->json(["message" => "Produit ajouté au panier"], 200);
    }

    public function get_panier(string $id)
    {
        $panier = DB::table('paniers')
            ->join('users', 'paniers.user_id', '=', 'users.id')
            ->where('users.id', $id)
            ->first();

        return response()->json(['panier' => $panier], 200);
    }

    public function delete_from_cart($id)
    {
        DB::table('paniers')->where('idpanier', $id)->delete();
        return response()->json(["message" => "Produit supprimé du panier"], 200);
    }
}
