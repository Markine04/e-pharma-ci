<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class PaniersController extends Controller
{

    public function index()
    {
        $paniers = DB::table('paniers')->get();
        return response()->json($paniers);
    }

    


}
