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
            "departamento.nombre as 'departamento_nombre', ".
            "area.nombre as 'area_nombre', ".
            "revision.created_at ".
            "FROM revision, corte, area, departamento, users ".
            "WHERE revision.fk_corte = corte.id ".
            "AND revision.fk_departamento = departamento.id ".
            "AND revision.vigencia = 1 ".
            "AND departamento.fk_area = area.id ".
            "AND revision.fk_user = users.id ".
            "AND users.work_id = '".$request->query('work_id')."'  " .
            "ORDER BY revision.id"
        );

        return response()->json($query, 201);
    }
}
