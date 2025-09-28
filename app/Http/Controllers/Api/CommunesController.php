<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Communes;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CommunesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $communes = DB::table('communes')->get();

        return response()->json([
            // 'message' => 'Liste de toutes les communes existente',
            'communes' => $communes,
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
    public function register_communes(Request $request)
    {
        
        $this->validate($request, [
            'libelle' => 'required|max:250',
        ]);
        // La validation de données

        // On crée une nouvelle communes
        $communes = Categorie::create([
            'libelle' => $request->libelle,
            'image' => $request->image,
            'user_id' => Auth::user()->id
        ]);

        // On retourne les informations du nouvel utilisateur en JSON
        return response()->json([
            'message' => 'communes créer avec succèss',
            'communes' => $communes,
        ],200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return response()->json([
            'communes' => DB::table('communes')->where('idcategorie', $id)->get(),]
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
        // On crée une nouvelle communes
        DB::table('communes')->where('id', $request->id)->update([
            'libelle' => $request->libelle,
            'image' => $request->image,
            'user_id' => Auth::user()->id,
            'updated_at'=>Carbon::now()
        ]);

        // On retourne les informations du nouvel utilisateur en JSON
        return response()->json([
            'message' => 'communes mis à jour avec succèss',
            'communes' => DB::table('communes')->where('id', $request->id)->get(),
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
