<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AssurancesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $assurances = DB::table('assurances')->paginate(10);

        return view('dashboard.assurances.index', compact('assurances'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.assurances.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::table('assurances')->insert([
            'libelle' => $request->libelle,
            'statut' => 1,
            'created_at' => Carbon::now(),
            'user_enreg' => Auth::user()->id,
        ]);
        return redirect()->route('assurances.index')->with('success', 'Assurance ajoutée avec succès');
    
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
