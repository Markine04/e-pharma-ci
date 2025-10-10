<?php

namespace App\Http\Controllers;

use App\Models\Communes;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class QuartiersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $quartiers = DB::table('quartiers')->paginate(10);
        return view('dashboard.quartiers.index', compact('quartiers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $communes = DB::table('communes')->get();
        return view('dashboard.quartiers.create', compact('communes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $data = $request->validate([
            'libelle' => 'required',
            'commune' => 'required',
        ]);
        DB::table('quartiers')->insert([
            'nom' => $data['libelle'],
            'id_commune' => $data['commune'],
            'user_enreg'=> Auth()->user()->id,
            'created_at' => Carbon::now(),

        ]);

        return redirect()->route('quartiers.index')->with('success', 'Le quartier a été ajouté avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show(Communes $communes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Communes $communes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Communes $communes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */

    public function delete(Request $request)
    {
        $quartier = DB::table('quartiers')->where('idquartier', $request->id)->first();
        return view('dashboard.quartiers.delete', compact('quartier'));
    }

    public function destroy(Request $request)
    {
        DB::table('quartiers')->where('idquartier', $request->quartier)->delete();
        return redirect()->route('quartiers.index')->with('success', 'Le quartier a été supprimé avec succès');
    }
}
