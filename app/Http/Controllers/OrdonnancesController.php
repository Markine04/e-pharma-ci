<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class OrdonnancesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ordonnances = DB::table('ordonnance_clients')->paginate(10);
        return view('dashboard.ordonnances.index',compact('ordonnances'));
    }

    public function show(string $id)
    {
        $ordonnances = DB::table('ordonnance_clients')->where('id_ordonnance', $id)->first();
        return view('dashboard.ordonnances.voir-image', compact('ordonnances'));
    }

    public function traiter(string $id)
    {
        $ordonnances = DB::table('ordonnance_clients')->where('id_ordonnance', $id)->first();
        return view('dashboard.ordonnances.voir-image', compact('ordonnances'));
    }


    public function verifier(Request $request)
    {
        DB::table('ordonnance_clients')->where('id_ordonnance', $request->id)->insert([
            'statut' => $request->id_client,
            'date_traitement' => $request->date_traitement,
            'user_traiter' => Auth::user()->id,
        ]);
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
        //
    }

    /**
     * Display the specified resource.
     */
    

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
