<?php

namespace App\Http\Controllers\Api;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function index()
    {
        // $users = DB::table('users')->get();

        return response()->json([
            'user'=>Auth::user()
        ],200);
    }

    // public function store_show()
    // {
    //     // $users = DB::table('users')->get();

    //     return response()->json([
    //         'user'=>Auth::user()
    //     ],200);
    // }

    public function register(Request $request)
    {
        // Validation des données
        $this->validate($request, [
            'number'=> 'required|min:10|unique:users,number',
            'commune' => 'nullable|integer'
        ]);

        // Génération d’un code OTP unique à 6 chiffres
        do {
            $code = rand(100000, 999999);
        } while (DB::table('users')->where('otp', $code)->exists());

        // Création du nouvel utilisateur
        $user = User::create([
            'number' => $request->number,
            'otp' => $request->code ?? $code,
            'otp_valid' => 1,
            'id_commune' => $request->commune,
            'created_at' => Carbon::now()
        ]);

        // Génération du token
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'user' => $user,
            'access_token' => $token,
            'token_type' => 'Bearer',
        ]);
    }



    public function login(Request $request)
    {
        if (!Auth::attempt($request->only('number'))) {
            return response()->json([
                'message' => 'Invalid login details'
            ], 401);
        }

        $user = User::where('number', $request['number'])->firstOrFail();

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'user' => $user,
            'access_token' => $token,
            'token_type' => 'secret',
        ]);
    }

    public function logout()
    {
        Auth::user()->tokens()->delete();
        return response([
            'message' => 'Vous etes deconnecter.',
        ],200);
    }

    
}
