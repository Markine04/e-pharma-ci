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
    public function index()
    {
        //
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
        //
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
