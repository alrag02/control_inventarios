<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class oficinaApiController extends Controller
{
    public function ObtenerUbicaciones(){
        $query = DB::select("SELECT ".
            "oficina.id AS 'id', ".
            "oficina.nombre AS 'oficina_nombre', ".
            "edificio.nombre AS 'edificio_nombre' ".
            "FROM oficina, edificio ".
            "WHERE oficina.fk_edificio = edificio.id ".
            "AND oficina.vigencia = 1");
        return response()->json($query, 201);

    }
}
