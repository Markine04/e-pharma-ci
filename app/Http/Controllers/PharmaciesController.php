<?php

namespace App\Http\Controllers;

use App\Models\Pharmacies;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PharmaciesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $pharmacies = DB::table('pharmacies')->paginate(10);
        return view('dashboard.pharmacies.index', compact('pharmacies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $communes = DB::table('communes')->get();
        $quartiers = DB::table('quartiers')->get();
        return view('dashboard.pharmacies.create', compact('communes', 'quartiers'));
    }


    public function upload(Request $request)
    {
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = time() . '_' . $file->getClientOriginalName();

            // Stockage temporaire
            $path = $file->move(public_path('/assets/pharmacies/'), $filename);

            return response()->json([
                'success' => true,
                'filename' => $filename,
                'original_name' => $file->getClientOriginalName(),
                'temp_path' => $path
            ]);
        }

        return response()->json(['success' => false], 400);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $filename = '';
        if ($request->hasfile('images')) {
            $filename = time() . '.' . $request->images->getClientOriginalExtension();
            $request->images->move(public_path('pharmacies/'), $filename);
        }

        // dd($filename);
        DB::table('pharmacies')->insert([
            'name' => strtoupper($request->name),
            'address' => $request->address,
            'phone' => $request->telephone,
            'images' => $filename,
            'commune_id' => $request->commune_id,
            'quartier_id' => $request->quartier_id,
            'latitude' => $request->latitude,
            'is_active' => 1,
            'longitude' => $request->longitude,
            'user_enreg'=>Auth::user()->id,
            'created_at' => Carbon::now(),
            // 'updated_at' => now(),
        ]);
        return redirect()->route('pharmacies.index')->with('success', 'Pharmacie ajoutée avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pharmacies $pharmacies)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        $pharmacies = DB::table('pharmacies')->where('idpharmacie', $request->id)->first();
        return view('dashboard.pharmacies.edit', compact('pharmacies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pharmacies $pharmacies)
    {
        $filename = '';
        if($request->images==""){
            $filename = $request->lastimages;
        }else{
            if ($request->hasfile('images')) {
                $filename = time() . '.' . $request->images->getClientOriginalExtension();
                $request->images->move(public_path('pharmacies/'), $filename);
            }
        }

        // dd($filename);
        DB::table('pharmacies')->where('idpharmacie',$request->id)->update([
            'name' => $request->name,
            'address' => $request->address,
            'phone' => $request->telephone,
            'images' => $filename,
            'commune_id' => $request->commune_id,
            'quartier_id' => $request->quartier_id,
            'latitude' => $request->latitude,
            'is_active' => 1,
            'longitude' => $request->longitude,
            'user_enreg' => Auth::user()->id,
            // 'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        return redirect()->route('pharmacies.index')->with('success', 'Pharmacie ajoutée avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */

    public function delete(Request $request)
    {
        $pharmacies = DB::table('pharmacies')->where('idpharmacie', $request->id)->first();
        return view('dashboard.pharmacies.delete', compact('pharmacies'));
    }

    public function destroy(Request $request)
    {
        DB::table('pharmacies')->where('idpharmacie', $request->id)->delete();
        return redirect()->route('pharmacies.index')->with('success', 'Pharmacie supprimée');
    }





    public function index_gardes()
    {
        $pharmaciesGardes = DB::table('pharmacie_gardes')->paginate(10);
        $Communes = DB::table('communes')->get();
        $currentDate = Carbon::now()->format('Y-m-d');
        return view('dashboard.pharmacies-gardes.index', compact('pharmaciesGardes', 'Communes', 'currentDate'));
    }

   public function create_gardes(Request $request)
{
    

    if ($request->ajax()) {
        $result = '';

        if ($request->title == 'communes' && $request->id) {
            $pharmacies = DB::table('pharmacies')
                ->where('commune_id', $request->id)
                ->get();

            foreach ($pharmacies as $pharmacie) {
                $result .= '<option value="' . $pharmacie->idpharmacie . '">' . $pharmacie->name . '</option>';
            }
            // dd($result);
            return $result;
        }
        
    }

        $communes = DB::table('communes')->get();
        return view('dashboard.pharmacies-gardes.create', compact('communes'));
    }

    public function store_garde(Request $request)
    {
        // dd($request->all());
        // Validation
        $request->validate([
            'commune' => 'required|exists:communes,idcommune',
            'pharmacie' => 'required|exists:pharmacies,idpharmacie',
            'date_debut' => 'required|date',
            'date_fin' => 'required|date|after_or_equal:date_debut',
            'note' => 'nullable|string|max:255',
        ]);

        // Enregistrement de la garde
        DB::table('pharmacie_gardes')->insert([
            'commune_id' => $request->commune,
            'pharmacie_id' => json_encode($request->pharmacie),
            'date_debut' => $request->date_debut,
            'date_fin' => $request->date_fin,
            'note' => $request->note,
            'user_enreg' => Auth::user()->id,
            'created_at' => Carbon::now(),
            // 'updated_at' => Carbon::now(),
        ]);

        return redirect()->route('pharmacies-gardes.index')->with('success', 'Garde enregistrée avec succès !');

        // return response()->json([
        //     'success' => true,
        //     'message' => 'Garde enregistrée avec succès !'
        // ]);
    }
}
