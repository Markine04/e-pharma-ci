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
            $path = $file->move(public_path('storage/categories'), $filename);
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
    public function show(Request $request)
    {
        $categories = DB::table('categories')
            ->where('show_app', 1)
            ->get(); // garder tous les champs pour afficher libelle

        $selected = $categories->pluck('idcategorie')->toArray();

        return view('dashboard.categories-medicaments.show', compact('categories', 'selected'));
    }

    public function storeshowapp(Request $request)
    {
        // Tableau des IDs sélectionnés
        $selected = $request->parent_id ?? [];

        // 1. Mettre show_app = 1 uniquement pour les IDs sélectionnés
        DB::table('categories')
            ->whereIn('idcategorie', $selected)
            ->update(['show_app' => 1]);

        // 2. Mettre show_app = null pour tous les autres
        DB::table('categories')
            ->whereNotIn('idcategorie', $selected)
            ->update(['show_app' => null]);

        return redirect()->back()->with('success', 'Catégorie affichée avec succès dans l\'application mobile');
        // dd( $categories);
    }
    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        $categories = DB::table('categories')->where('idcategorie', $request->id)->first();
        return view('dashboard.categories-medicaments.edit', compact('categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CategorieMedicaments $categorieMedicaments)
    {
        
        $filename = '';
        if ($request->hasFile('images')) {
            $file = $request->file('images');
            $filename = time() . '_' . $file->getClientOriginalName();

            // Stockage temporaire
            $path = $file->move(public_path('storage/categories'), $filename);
        }


        // On crée une nouvelle categories
        $categories = DB::table('categories')->where('idcategorie', $request->idcategorie)->update([
            'libelle' => $request->libelle,
            'image' => $filename,
            'parent_id' => $request->parent_id,
            'description' => $request->description,
            'statut' => 1,
            'user_enreg' => Auth::user()->id,
            'updated_at' => Carbon::now()
        ]);

        return redirect()->back()->with('success', 'Categorie mis à jour avec succès');
    }


    public function delete(Request $request)
    {
        $categories = DB::table('categories')->where('idcategorie', $request->id)->first();
        return view('dashboard.categories-medicaments.delete', compact('categories'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('categories')->where('idcategorie', $id)->delete();

        return redirect()->back()->with('success', 'Catégorie de médicament supprimée avec succès');
    }
}
