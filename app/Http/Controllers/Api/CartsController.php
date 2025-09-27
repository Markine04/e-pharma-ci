<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class CartsController extends Controller
{

    public function addToCart(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|integer',
            'produit_id' => 'required|integer',
            'quantite' => 'required|integer|min:1',
            'prix_unitaire' => 'required|numeric',
        ]);

        DB::table('paniers')->insert([
            'user_id' => $validated['user_id'],
            'produit_id' => $validated['produit_id'],
            'quantite' => $validated['quantite'],
            'prix_unitaire' => $validated['prix_unitaire'],
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return response()->json(["message" => "Produit ajouté au panier"], 200);
    }
}
