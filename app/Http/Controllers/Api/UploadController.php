<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class UploadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $ordonnances = DB::table('ordonnance_clients')
        ->join('pharmacies', 'ordonnance_clients.id_pharmacie', '=', 'pharmacies.idpharmacie')
        ->select('ordonnance_clients.*', 'pharmacies.*')
        ->where('id_client',$request->user()->id)->get();

        return response()->json([
            'success' => true,
            'ordonnances' => $ordonnances,
        ], 200);
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
        $name = "";

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $name = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('ordonnances-clients', $name, 'public');

            DB::table('ordonnance_clients')->insert([
                'image' => $name,
                // 'id_ordonnance' => $request->id_ordonnance,
                'id_client' => $request->id_client,
                'note' => $request->note,
                'statut' => 1,
                "created_at" => Carbon::now(),
            ]);

            return response()->json([
                'success' => true,
                'note'=> $request->note,
                'url' => asset('storage/ordonnances-clients/' . $name)
            ], 200);
        }



        return response()->json(['success' => false, 'message' => 'Aucune image reçue'], 400);
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $detailsordonnances = DB::table('ordonnance_clients')
            ->join('pharmacies', 'ordonnance_clients.id_pharmacie', '=', 'pharmacies.idpharmacie')
            ->select('ordonnance_clients.*', 'pharmacies.*')
            ->where('id_client', $request->user()->id)
            ->where('id_ordonnance', $id)
            ->get();

        return response()->json([
            'success' => true,
            'detailsordonnances' => $detailsordonnances,
        ], 200);
    }

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
