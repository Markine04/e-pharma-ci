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

    public function register(Request $request)
    {
        // La validation de données
        $this->validate($request, [
            // 'name' => 'required|max:100',
            'username' => 'required|max:100',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8'
        ]);

        // On crée un nouvel utilisateur
        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'number' => $request->number,
            'created_at' => Carbon::now()

        ]);

        $token = $user->createToken('auth_token')->plainTextToken;

        // On retourne les informations du nouvel utilisateur en JSON
        return response()->json([
            'user'=>$user,
            'access_token' => $token,
            'token_type' => 'secret',
        ]);
    }


    public function login(Request $request)
    {
        if (!Auth::attempt($request->only('email', 'username', 'password'))) {
            return response()->json([
                'message' => 'Invalid login details'
            ], 401);
        }

        $user = User::where('email', $request['email'])
                ->orwhere('username', $request['username'])->firstOrFail();

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
