<?php

namespace App\Http\Controllers;

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
        $users = DB::table('users')->where('number','!=',null)->orderBy('id','Desc')->get();
        return view('auth.index',compact('users'));
    }

     public function delete(Request $request)
    {
        $users = DB::table('users')->where('id',$request->id)->first();
        return view('auth.delete',compact('users'));
    }

     public function destroy(Request $request)
    {
        $users = DB::table('users')->where('id',$request->id)->delete();
        return redirect()->back()->with('success','Utilisateur supprimer avec succes');
    }
    
}
