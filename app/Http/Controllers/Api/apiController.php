<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class apiController extends Controller
{
    public function home(){
        return "Está conectado a la API";
    }

    public function login(Request $request)
    {
        $query = DB::table('users')->where('work_id', $request->query('work_id'))->pluck('password')->first();
        return response()->json( Hash::check($request->query('password'), $query), 201);
    }

}
