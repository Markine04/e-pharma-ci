<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\CategorieMedicaments;

class CategorieMedicamentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = DB::table('categories')->paginate(10);
        return view('dashboard.categories-medicaments.index',compact('categories'));
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
    public function show(CategorieMedicaments $categorieMedicaments)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CategorieMedicaments $categorieMedicaments)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CategorieMedicaments $categorieMedicaments)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CategorieMedicaments $categorieMedicaments)
    {
        //
    }
}
