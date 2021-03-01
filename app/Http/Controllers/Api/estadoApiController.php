<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class estadoApiController extends Controller
{
    public function ObtenerEstados(){
        $query = DB::select("SELECT ".
            "id, ".
            "nombre AS 'estado_nombre' ".
            "FROM estado ".
            "WHERE vigencia = 1");
        return response()->json($query, 201);

    }
}
