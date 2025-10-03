<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AffichageAppsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $AffichagesApp = DB::table('categories')->paginate(10);

        return view('dashboard.affichage-apps.index', compact('AffichagesApp'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.formes-galeniques.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::table('forme_galeniques')->insert([
            'libelle' => $request->libelle,
            'statut' => 1,
            'created_at' => Carbon::now(),
            'user_enreg' => Auth::user()->id,
        ]);

        return redirect()->back()->with('success', 'Forme galenique ajoutée avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $formesGaleniques = DB::table('forme_galeniques')->where('id_formegalenique', $id)->first();

        return view('dashboard.formes-galeniques.edit', compact('formesGaleniques'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        DB::table('forme_galeniques')->where('id_formegalenique', $request->id)->update([
            'libelle' => $request->libelle,
            'statut' => 1,
            'updated_at' => Carbon::now(),
            'user_enreg' => Auth::user()->id,
        ]);

        return redirect()->back()->with('success', 'Forme galenique mis a jour avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */

    public function delete(string $id)
    {
        $formesGaleniques = DB::table('forme_galeniques')->where('id_formegalenique', $id)->first();

        return view('dashboard.formes-galeniques.delete', compact('formesGaleniques'));
    }


    public function destroy(string $id)
    {
        DB::table('forme_galeniques')->where('id_formegalenique', $id)->delete();

        return redirect()->back()->with('success', 'Forme galenique supprimée avec succès');
    }
}
