<?php

namespace App\Http\Controllers;

use App\Models\Communes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommunesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $communes = DB::table('communes')->get();
        return view('dashboard.communes.index', compact('communes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $regions = DB::table('regions')->get();
        return view('dashboard.communes.create', compact('regions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $data = $request->validate([
            'name' => 'required',
            'region_id' => 'required',
        ]);
        DB::table('communes')->insert([
            'name' => $data['name'],
            'region_id' => $data['region_id'],
        ]);

        return redirect()->route('communes.index')->with('success', 'La commune a été ajoutée avec succès');
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
    
    public function edit(Request $request)
    {
        $communes = DB::table('communes')->where('idcommune', $request->id)->first();
        $regions = DB::table('regions')->get();
        return view('dashboard.communes.edit', compact('regions', 'communes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        DB::table('communes')->where('idcommune', $request->id)->update([
            'name' => $request->name,
            'region_id' => $request->region_id,
        ]);

        return redirect()->route('communes.index')->with('success', 'La commune a été ajoutée avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */

    public function delete(Request $request)
    {
        $commune = DB::table('communes')->where('idcommune', $request->id)->first();
        return view('dashboard.communes.delete', compact('commune'));
    }

    public function destroy(Request $request)
    {
        DB::table('communes')->where('idcommune', $request->id)->delete();
        return redirect()->route('communes.index')->with('success', 'La commune a été supprimée avec succès');
    }
}
