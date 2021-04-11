<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class revisionApiController extends Controller
{
    public function ConsultarRevisionesPorWorkId(Request $request){
        $query = DB::select("SELECT ".
            "revision.id, ".
            "corte.created_at as 'corte_created_at', ".
            "corte.nombre as 'corte_nombre', ".
            "oficina.nombre as 'oficina_nombre', ".
            "edificio.nombre as 'edificio_nombre', ".
            "revision.created_at ".
            "FROM revision, corte, edificio, oficina, users ".
            "WHERE revision.fk_corte = corte.id ".
            "AND revision.fk_oficina = oficina.id ".
            "AND revision.vigencia = 1 ".
            "AND oficina.fk_edificio = edificio.id ".
            "AND revision.fk_user = users.id ".
            "AND users.work_id = '".$request->query('work_id')."'  " .
            "ORDER BY revision.id"
        );

        return response()->json($query, 201);
    }
}
