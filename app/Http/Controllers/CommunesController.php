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
        $communes = DB::table('communes')->paginate(10);
        return view('dashboard.communes.index', compact('communes'));
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
    public function destroy(Communes $communes)
    {
        //
    }
}
