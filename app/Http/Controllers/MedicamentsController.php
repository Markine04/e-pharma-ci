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
        $medicaments = DB::table('medicaments')->get();

        return view('dashboard.medicaments.index', compact('medicaments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = DB::table('categories')->get();
        $suppliers = DB::table('fournisseurs')->get();
        $formesGaleniques = DB::table('forme_galeniques')->get();

        do {
            // Génère un code aléatoire entre 1000000 et 9999999
            $code = rand(1000000, 9999999);

            // Vérifie si le code existe déjà en base
            $exists = DB::table('medicaments')   // <-- change le nom de la table
                ->where('code_barre', $code)
                ->exists();
        } while ($exists);

        // return $code;

        return view('dashboard.medicaments.create', compact('categories', 'suppliers', 'formesGaleniques','code'));
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
            $path = $file->move(public_path('storage/temp'), $filename);

            return response()->json([
                'success' => true,
                'temp_filename' => $filename,
                'original_name' => $file->getClientOriginalName(),
                'temp_path' => $path
            ]);
        }

        return response()->json(['success' => false], 400);
    }


    public function store(Request $request)
    {
        // dd($request->all());

        $recupererImages = [];

        if ($request->temp_images) {
            foreach ($request->temp_images as $tempImage) {

                $tempPath = public_path('storage/temp/' . $tempImage);

                if (file_exists($tempPath)) {
                    $newName = time() . '_' . uniqid() . '.' . pathinfo($tempImage, PATHINFO_EXTENSION);

                    // Déplacer du temp -> produits
                    rename($tempPath, public_path('storage/produits/' . $newName));

                    $recupererImages[] = $newName;
                }
            }
        }

        DB::table('medicaments')->insert([
            "code_barre" => $request->barcode,
            "nom" => $request->name,
            "principe_actif" => $request->active_ingredient,
            "dosage" => $request->dosage,
            "forme_galenique" => $request->galenic_form,
            "indications" => $request->indication,
            "posologies" => $request->posologie,
            "contreindications" => $request->contreindication,
            "compositions" => $request->composition,
            "categorie_id" => json_encode($request->category),
            "fournisseur_id" => $request->supplier,
            "prix_achat" => $request->purchase_price,
            "prix_vente" => $request->selling_price,
            "taux_tva" => $request->vat_rate,
            "besoin_ordonnance" => $request->prescription_required,
            "conditionnement" => $request->packaging,
            "temperature_conservation" => $request->storage_temperature,
            "description" => $request->description,
            "images" => json_encode($recupererImages),
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
    public function edit(Request $request)
    {
        $medicaments = DB::table('medicaments')->where('idmedicament', $request->id)->first();
        $categories = DB::table('categories')->get();
        $suppliers = DB::table('fournisseurs')->get();
        $formesGaleniques = DB::table('forme_galeniques')->get();

        return view('dashboard.medicaments.edit', compact('medicaments', 'categories', 'suppliers', 'formesGaleniques'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Medicaments $medicaments)
    {

        $recupererImages = [];

        if ($request->temp_images) {
            foreach ($request->temp_images as $tempImage) {

                $tempPath = public_path('storage/temp/' . $tempImage);

                if (file_exists($tempPath)) {
                    $newName = time() . '_' . uniqid() . '.' . pathinfo($tempImage, PATHINFO_EXTENSION);

                    // Déplacer du temp -> produits
                    rename($tempPath, public_path('storage/produits/' . $newName));

                    $recupererImages[] = $newName;
                }
            }
        }

        DB::table('medicaments')->where('idmedicament', $request->id_medicament)->update([
            "code_barre" => $request->barcode,
            "nom" => $request->name,
            "principe_actif" => $request->active_ingredient,
            "dosage" => $request->dosage,
            "forme_galenique" => $request->galenic_form,
            "indications" => $request->indication,
            "posologies" => $request->posologie,
            "contreindications" => $request->contreindication,
            "compositions" => $request->composition,
            "categorie_id" => json_encode($request->category),
            "fournisseur_id" => $request->supplier,
            "prix_achat" => $request->purchase_price,
            "prix_vente" => $request->selling_price,
            "taux_tva" => $request->vat_rate,
            "besoin_ordonnance" => $request->prescription_required,
            "conditionnement" => $request->packaging,
            "temperature_conservation" => $request->storage_temperature,
            "description" => $request->description,
            "images" => json_encode($recupererImages),
            "user_enreg" => Auth::user()->id,
            "updated_at" => Carbon::now(),
        ]);


        return redirect()->back()->with('success', 'Medicament ajouté avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Medicaments $medicaments)
    {
        //
    }
}
