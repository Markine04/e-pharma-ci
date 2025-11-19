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
        ->join('type_assureurs', 'users.idassureur', 'type_assureurs.id_assureur')
        ->where('users.id', $user)
        ->get();

        return response()->json([
            'success' => true,
            'assurances' => $assurances,
        ], 200);
    }


    public function get_assureur(){
        $assureurs = DB::table('type_assurances')->get();

        return response()->json([
                'success' =>true,
                'assureurs' => $assureurs,
            ],200);
    }










    


    public function offres()
    {
        $offres = DB::table('offres')->get();

        return response()->json([
            'offres' => $offres
        ], 200);
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
            'number' => 'required|min:10|unique:users,number',
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
        // $tokens = $request->token;
        return response()->json([
            'user' => $user,
            'access_token' => $token,
            'token_type' => 'Bearer',
            'success' => true,
        ], 200);
    }



    public function login(Request $request)
    {
        $user = User::where('number', $request->number)->first();

        if (!$user) {
            return response()->json([
                'message' => 'Invalid login details'
            ], 401);
        }

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'user' => $user,
            'access_token' => $token,
            'token_type' => 'Bearer', // plus standard que "secret"
            'success' => true,
        ], 200);
    }


    public function info(Request $request)
    {
        $users = DB::table('users')->where('id', Auth::user()->id)->first();
        return response()->json([
            'success' => true,
            'user' => Auth::user()
        ], 200);
    }


    public function verifyOtp(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'otp' => 'required',
        ]);

        $user = DB::table('users')->where('id', $request->user_id)->first();

        if (DB::table('users')->where('id', $user->id)->where('otp', $request->otp)->exists()) {

            DB::table('users')->where('id', $user->id)->update([
                'otp_valid' => 2
            ]);

            // générer un token (Sanctum / JWT)
            $token = $request->token;

            return response()->json([
                'success' => true,
                'message' => 'OTP valide',
                'access_token' => $token,
                'token_type' => 'secret',
                'user' => $user,
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'OTP invalide',
        ], 401);
    }



    public function resendOtp(Request $request)
    {
        $user = User::where('id', $request->user_id)->first();

        if (!$user) {
            return response()->json(['message' => 'Utilisateur non trouvé'], 404);
        }

        $newOtp = rand(100000, 999999);
        $user->otp_code = $newOtp;
        $user->save();

        // Ici tu peux envoyer SMS via ton service (Twilio, Orange, etc.)
        // SmsService::send($user->phone, "Votre code OTP est $newOtp");

        return response()->json(['message' => 'Nouveau code envoyé']);
    }



    public function logout(Request $request)
    {
        Auth::user()->currentAccessToken()->delete();
        return response([
            'message' => 'Vous êtes déconnecter.',
        ], 200);
    }
}
