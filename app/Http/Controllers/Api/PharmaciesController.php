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
    
}
