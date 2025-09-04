<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Categorie;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class MedicamentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index_medicaments()
    {
        $medicaments = DB::table('medicaments')->get();

        return response()->json([
            // 'message' => 'Liste de toutes les medicaments existente',
            'medicaments' => $medicaments,
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
    public function register_medicaments(Request $request)
    {

        $this->validate($request, [
            'libelle' => 'required|max:250',
        ]);
        // La validation de données

        // On crée une nouvelle medicaments
        $medicaments = Categorie::create([
            'libelle' => $request->libelle,
            'image' => $request->image,
            'user_id' => Auth::user()->id

        // code_barre Index
        // nom
        // principe_actif
        // dosage
        // forme_galenique
        // categorie_id
        // fournisseur_id
        // prix_achat
        // prix_vente
        // taux_tva
        // besoin_ordonnance
        // conditionnement
        // temperature_conservation
        // user_enreg
        // created_at
        // updated_at


















        ]);

        // On retourne les informations du nouvel utilisateur en JSON
        return response()->json([
            'message' => 'medicaments créer avec succèss',
            'medicaments' => $medicaments,
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return response()->json([
            'medicaments' => DB::table('medicaments')->where('id', $id)->get()],
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
        // On crée une nouvelle medicaments
        DB::table('medicaments')->where('id', $request->id)->update([
            'libelle' => $request->libelle,
            'image' => $request->image,
            'user_id' => Auth::user()->id,
            'updated_at' => Carbon::now()
        ]);

        // On retourne les informations du nouvel utilisateur en JSON
        return response()->json([
            'message' => 'medicaments mis à jour avec succèss',
            'medicaments' => DB::table('medicaments')->where('id', $request->id)->get(),
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
