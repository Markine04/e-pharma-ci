<?php

namespace App\Http\Controllers\Api;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AssurancesController extends Controller
{
    public function index(Request $request)
    {
        // 🔐 Récupère automatiquement l'utilisateur grâce à Sanctum
        $user = $request->user()->id;

        $assurances = DB::table('users')
        ->join('assurances', 'users.assurance_id', 'assurances.id_assurance')
        ->where('users.id', $user)
        ->get();

        return response()->json([
            'success' => true,
            'assurances' => $assurances,
        ], 200);
    }


    public function get_typeAssurance(){
        $typeAssurances = DB::table('type_assurances')->get();

        return response()->json([
                'success' =>true,
                'typeAssurances' => $typeAssurances,
            ],200);
    }

     public function get_compagnieAssurances(){
        $compagnieAssurances = DB::table('compagnie_assurances')->get();

        return response()->json([
                'success' =>true,
                'compagnieAssurances' => $compagnieAssurances,
            ],200);
    }

     public function store(Request $request)
    {
        // Validation des données
        $this->validate($request, [
            'date_debut' => 'required',
            'numero_police' => 'required',
            'compagnie'	=>	'required',		
            'date_fin' => 'required',
            'type_assurance' => 'nullable|integer'
        ]);
        $user = $request->user()->id;
        // Création du nouvel utilisateur
        
        $name = "";

        if ($request->hasFile('images')) {
            $file = $request->file('images');
            $name = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('assurances-cartes', $name, 'public');

        $assurances = DB::table('assurances')->insert([
            'user_id' => $user,
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'compagnie' => $request->compagnie,
            'numero_police' => $request->numero_police,
            'date_debut' => $request->date_debut,
            'date_fin' => $request->date_fin,
            'type_assurance' => $request->type_assurance,
            'images' => $name,
            'created_at' => Carbon::now()
        ]);
        }

        return response()->json([
                'success' => true,
                'assurances'=> $assurances,
                'url' => asset('storage/assurances-cartes/' . $name)
            ], 200);
    }
}
