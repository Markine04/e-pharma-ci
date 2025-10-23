<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommandesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $commandes = DB::table('paniers')->paginate(10);
        return view('dashboard.commandes.index',compact('commandes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function show_panier(string $id)
    {
        $panier = DB::table('paniers')
        ->join('users', 'paniers.user_id', '=', 'users.id')
        ->where('users.id', $id)->first();

        return view('dashboard.commandes.show-panier', compact('panier'));
    }

    public function show(string $id)
    {
        $medicaments = DB::table('medicaments')->where('idmedicament', $id)->first();
        return view('dashboard.commandes.voir-image', compact('medicaments'));
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
