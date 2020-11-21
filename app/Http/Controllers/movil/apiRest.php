<?php

namespace App\Http\Controllers\movil;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class apiRest extends Controller
{
    public function login(){

        if (Auth::onceBasic()){
            return response()->json(['message' => 'Autenticacion fallo'],401);
        }else{
            return response()->json(['message' => 'Autenticacion correcta'],400);
        }
    }
}
