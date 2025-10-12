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

class QuartiersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $quartiers = DB::table('quartiers')->get();

        return response()->json([
            // 'message' => 'Liste de toutes les communes existente',
            'quartiers' => $quartiers,
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
    public function store(Request $request)
    {

        $this->validate($request, [
            'libelle' => 'required|max:250',
        ]);
        // La validation de données

        // On crée une nouvelle communes
        $quartiers = Quartiers::create([
            'libelle' => $request->libelle,
            'image' => $request->image,
            'user_id' => Auth::user()->id
        ]);

        // On retourne les informations du nouvel utilisateur en JSON
        return response()->json([
            'message' => 'quartier créer avec succèss',
            'quartiers' => $quartiers,
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $quartiers = DB::table('quartiers')->where('idquartier', $id)->get();

        return response()->json(
            [
                'quartiers' => $quartiers,
                200
            ]
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
        DB::table('quartiers')->where('idquartier', $request->id)->update([
            'libelle' => $request->libelle,
            'image' => $request->image,
            'user_id' => Auth::user()->id,
            'updated_at' => Carbon::now()
        ]);

        // On retourne les informations du nouvel utilisateur en JSON
        return response()->json([
            'message' => 'quartier mis à jour avec succèss',
            'quartiers' => DB::table('quartiers')->where('idquartier', $request->id)->get(),
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
