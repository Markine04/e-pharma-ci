<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\CategorieMedicaments;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class CategorieMedicamentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = DB::table('categories')->get();
        return view('dashboard.categories-medicaments.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   $categories = DB::table('categories')->get();
        return view('dashboard.categories-medicaments.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'libelle' => 'required|max:250',
        ]);
        
        $filename='';
        if ($request->hasFile('images')) {
            $file = $request->file('images');
            $filename = time() . '_' . $file->getClientOriginalName();

            // Stockage temporaire
            $path = $file->move(public_path('/assets/images/categories'), $filename);
        }

        
        // On crée une nouvelle categories
        $categories = DB::table('categories')->insert([
            'libelle' => $request->libelle,
            'image' => $filename,
            'parent_id' => $request->parent_id,
            'description'=> $request->description,
            'statut'=>1,
            'user_enreg' => Auth::user()->id,
            'created_at'=>Carbon::now()
        ]);

        return redirect()->back()->with('success', 'Categorie enregistrer avec succès');
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
