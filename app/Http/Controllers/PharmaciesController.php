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
        return view('dashboard.pharmacies.create', compact('communes'));
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
        // dd($request->all());


        $filename = '';
        if ($request->hasfile('images')) {
            $filename = time() . '.' . $request->images->getClientOriginalExtension();
            $request->images->move(public_path('pharmacies/'), $filename);
        }

        // dd($filename);
        DB::table('pharmacies')->insert([
            'name' => $request->name,
            'address' => $request->address,
            'phone' => $request->telephone,
            'images' => $filename,
            'commune_id' => $request->commune_id,
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
    public function edit(Pharmacies $pharmacies)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pharmacies $pharmacies)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pharmacies $pharmacies)
    {
        //
    }
}
