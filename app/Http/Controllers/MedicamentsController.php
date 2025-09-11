<?php

namespace App\Http\Controllers;

use App\Models\Medicaments;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class MedicamentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.medicaments.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.medicaments.create');
    }

    /**
     * Store a newly created resource in storage.
     */


    public function uploadImages(Request $request)
    {
        // $request->validate([
        //     'file' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048'
        // ]);

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = time() . '_' . $file->getClientOriginalName();

            // Stockage temporaire
            $path = $file->move(public_path('/assets/images/produits'), $filename);

            return response()->json([
                'success' => true,
                'filename' => $filename,
                'original_name' => $file->getClientOriginalName(),
                'temp_path' => $path
            ]);
        }

        return response()->json(['success' => false], 400);
    }


    public function store(Request $request)
    {
        dd($request->all());

        
        $imageName = [];
        if ($request->hasFile('images')) {
            // foreach ($request->file('images') as $image) {
                // Générer un nom unique pour l'image
                $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                $path = $file->move(public_path('/assets/images/produits/'), $filename);

            // Stocker l'image
            // $image->move('assets/images/produits', $imageName);

                // Enregistrer en base de données (si vous avez une table pour les images)
                // ProductImage::create([...]);
            // }
        }

        DB::table('medicaments')->insert([
            "code_barre" => $request->barcode,
            "nom" => $request->name,
            "principe_actif" => $request->active_ingredient,
            "dosage" => $request->dosage,
            "forme_galenique" => $request->galenic_form,
            "categorie_id" => $request->category,
            "fournisseur_id" => $request->supplier,
            "prix_achat" => $request->purchase_price,
            "prix_vente" => $request->selling_price,
            "taux_tva" => $request->vat_rate,
            "besoin_ordonnance" => $request->prescription_required,
            "conditionnement" => $request->packaging,
            "temperature_conservation" => $request->storage_temperature,
            "description" => $request->description,
            "images" => json_encode($imageName),
            "user_enreg" => Auth::user()->id,
            "created_at" => Carbon::now(),
        ]);
        return redirect()->back()->with('success', 'Medicament ajouté avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show(Medicaments $medicaments)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Medicaments $medicaments)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Medicaments $medicaments)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Medicaments $medicaments)
    {
        //
    }
}
