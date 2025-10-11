<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Pharmacies;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PharmaciesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index_pharmacies()
    {
        $pharmacies = DB::table('pharmacies')->get();

        return response()->json([
            // 'message' => 'Liste de toutes les categories existente',
            'pharmacies' => $pharmacies,
        ], 200);
    }


    public function search_pharmacies(Request $request)
    {
        $query = $request->get('q', '');
        if (empty($query)) {
            return response()->json([
                'message' => 'Veuillez entrer un mot clé',
            ], 400);
        }

        $querypharmacies = DB::table('pharmacies')->where('name', 'like', "%$query%")->get();

        return response()->json([
            // 'message' => 'Liste de toutes les categories existente',
            'querypharmacies' => $querypharmacies,
        ], 200);
    }


    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    // public function register_categories(Request $request)
    // {
        
    //     $this->validate($request, [
    //         'libelle' => 'required|max:250',
    //     ]);
    //     // La validation de données

    //     // On crée une nouvelle categories
    //     $pharmacies = DB::table('pharmacies')->insert([
    //         'name' => $request->name,
    //         'address' => $request->address,
    //         'phone' => $request->telephone,
    //         'images' => $filename,
    //         'commune_id' => $request->commune_id,
    //         'latitude' => $request->latitude,
    //         'is_active' => 1,
    //         'longitude' => $request->longitude,
    //         'user_enreg' => Auth::user()->id,
    //         'created_at' => Carbon::now(),
    //         // 'updated_at' => now(),
    //     ]);

    //     // On retourne les informations du nouvel utilisateur en JSON
    //     return response()->json([
    //         'message' => 'pharmacies créer avec succèss',
    //         'pharmacies' => $pharmacies,
    //     ],200);
    // }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return response()->json(
            [
                'pharmacies' => DB::table('pharmacies')->where('idpharmacie', $id)->get()
            ],
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // On crée une nouvelle categories
        DB::table('categories')->where('id', $request->id)->update([
            'libelle' => $request->libelle,
            'image' => $request->image,
            'user_id' => Auth::user()->id,
            'updated_at'=>Carbon::now()
        ]);

        // On retourne les informations du nouvel utilisateur en JSON
        return response()->json([
            'message' => 'Categories mis à jour avec succèss',
            'categories' => DB::table('categories')->where('id', $request->id)->get(),
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }




    public function index_pharmacies_gardes()
    {
        $ids_pharmacies = [];
        $pharmacies_gardes = DB::table('pharmacie_gardes')->get();

        foreach ($pharmacies_gardes as $pharmacie_garde) {
            $ids = json_decode($pharmacie_garde->pharmacie_id, true);
            if (is_array($ids)) {
                $ids_pharmacies = array_merge($ids_pharmacies, $ids);
            }
        }

        // Supprimer les doublons
        $ids_pharmacies = array_unique($ids_pharmacies);

        // Requête unique
        $data = DB::table('pharmacies')
            ->whereIn('idpharmacie', $ids_pharmacies)
            ->get();

        return response()->json([
            'pharmacies_gardes' => $data,
        ], 200);
    }


    public function search_pharmacies_gardes(Request $request)
    {
        $query = $request->get('q', '');

        if (empty($query)) {
            return response()->json([
                'message' => 'Veuillez entrer le nom de la pharmacie',
            ], 400);
        }

        // Récupération des enregistrements pharmacie_gardes
        $pharmacies_gardes = DB::table('pharmacie_gardes')->get();

        $ids_pharmacies = [];

        foreach ($pharmacies_gardes as $pharmacie_garde) {
            $ids = json_decode($pharmacie_garde->pharmacie_id, true);

            // Vérifie si c'est un tableau
            if (is_array($ids)) {
                $ids_pharmacies = array_merge($ids_pharmacies, $ids);
            }
        }

        // Supprimer les doublons (au cas où)
        $ids_pharmacies = array_unique($ids_pharmacies);

        // Requête sur la table 'pharmacies' avec LIKE sur 'name' et filtrage sur les IDs
        $liste_pharma = DB::table('pharmacies')
            ->whereIn('idpharmacie', $ids_pharmacies)
            ->where('name', 'like', "%{$query}%")
            ->get(['idpharmacie', 'name', 'address', 'phone', 'images', 'commune_id', 'quartier_id', 'latitude', 'longitude']);

        return response()->json([
            'querypharmacies_gardes' => $liste_pharma,
        ], 200);
    }


    public function show_pharmacies_gardes(string $id)
    {
        return response()->json(
            [
                'pharmacies_gardes' => DB::table('pharmacie_gardes')->where('idpharmacie_garde', $id)->get()
            ],
        );
    }
}
