<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class articuloApiController extends Controller
{
    //
    public function ConsultarArticulosPorWorkId(Request $request)
    {
        $query = DB::select("SELECT " .
            "articulo.id, " .
            "articulo.etiqueta_local, " .
            "articulo.etiqueta_externa, " .
            "articulo.concepto, " .
            "articulo.marca, " .
            "articulo.modelo, " .
            "articulo.descripcion, " .
            "articulo.numero_serie, " .
            "articulo.color, " .
            "articulo.cantidad, " .
            "articulo.placas, " .
            "articulo.observaciones, " .
            "articulo.disponibilidad, " .
            "estado.nombre AS 'estado_nombre', " .
            "area.nombre AS 'area_nombre', " .
            "departamento.nombre AS 'departamento_nombre', " .
            "edificio.nombre AS 'edificio_nombre', " .
            "oficina.nombre AS 'oficina_nombre', " .
            "foto.image AS 'foto_nombre' ".
            "FROM articulo,estado,area,departamento,edificio,oficina,users,revision,foto " .
            "WHERE articulo.vigencia = 1 " .
            "AND area.id = departamento.fk_area " .
            "AND departamento.id = articulo.fk_departamento " .
            "AND edificio.id = oficina.fk_edificio " .
            "AND oficina.id = articulo.fk_oficina " .
            "AND foto.id = articulo.fk_foto " .
            "AND articulo.fk_estado = estado.id " .
            "AND articulo.fk_revision = revision.id ".
            "AND revision.fk_user = users.id " .
            "AND users.work_id = '" . $request->query('work_id') . "' ".
            "ORDER BY articulo.etiqueta_local");

        return response()->json($query, 201);

    }

    public function ConsultarArticulosPorEtiquetaExterna(Request $request){
        $query = DB::select("SELECT " .
            "articulo.id, " .
            "articulo.etiqueta_local, " .
            "articulo.etiqueta_externa, " .
            "articulo.concepto, " .
            "articulo.marca, " .
            "articulo.modelo, " .
            "articulo.descripcion, " .
            "articulo.numero_serie, " .
            "articulo.color, " .
            "articulo.cantidad, " .
            "articulo.placas, " .
            "articulo.observaciones, " .
            "articulo.disponibilidad, " .
            "estado.nombre AS 'estado_nombre', " .
            "area.nombre AS 'area_nombre', " .
            "departamento.nombre AS 'departamento_nombre', " .
            "edificio.nombre AS 'edificio_nombre', " .
            "oficina.nombre AS 'oficina_nombre', " .
            "foto.image AS 'foto_nombre' ".
            "FROM articulo,estado,area,departamento,edificio,oficina,foto " .
            "WHERE articulo.vigencia = 1 " .
            "AND area.id = departamento.fk_area " .
            "AND departamento.id = articulo.fk_departamento " .
            "AND edificio.id = oficina.fk_edificio " .
            "AND oficina.id = articulo.fk_oficina " .
            "AND foto.id = articulo.fk_foto " .
            "AND articulo.fk_estado = estado.id " .
            "AND articulo.etiqueta_externa = '" . $request->query('etiqueta_externa') . "' " .
            "ORDER BY articulo.etiqueta_local");

        return response()->json($query, 201);
    }

    public function ConsultarDetallesArticuloPorEtiquetaLocal(Request $request){
        $query = DB::select("SELECT " .
            "articulo.id, " .
            "articulo.etiqueta_local, " .
            "articulo.etiqueta_externa, " .
            "articulo.concepto, " .
            "articulo.marca, " .
            "articulo.modelo, " .
            "articulo.descripcion, " .
            "articulo.numero_serie, " .
            "articulo.color, " .
            "articulo.cantidad, " .
            "articulo.placas, " .
            "articulo.observaciones, " .
            "articulo.disponibilidad, " .
            "estado.id AS 'estado_id', " .
            "estado.nombre AS 'estado_nombre', " .
            "area.nombre AS 'area_nombre', " .
            "departamento.nombre AS 'departamento_nombre', " .
            "edificio.nombre AS 'edificio_nombre', " .
            "oficina.id AS 'oficina_id', " .
            "oficina.nombre AS 'oficina_nombre', " .
            "foto.image AS 'foto_nombre' ".
            "FROM articulo,estado,area,departamento,edificio,oficina,foto " .
            "WHERE articulo.vigencia = 1 " .
            "AND area.id = departamento.fk_area " .
            "AND departamento.id = articulo.fk_departamento " .
            "AND edificio.id = oficina.fk_edificio " .
            "AND oficina.id = articulo.fk_oficina " .
            "AND foto.id = articulo.fk_foto " .
            "AND articulo.fk_estado = estado.id " .
            "AND articulo.etiqueta_local = '" . $request->query('etiqueta_local') . "'");
        return response()->json($query, 201);
    }

    public function ConsultarArticulosPorRevision(Request $request)
    {
        $query = DB::select("SELECT ".
            "articulo.id, " .
            "articulo.etiqueta_local, " .
            "articulo.etiqueta_externa, " .
            "articulo.concepto, " .
            "articulo.marca, " .
            "articulo.modelo, " .
            "articulo.descripcion, " .
            "articulo.numero_serie, " .
            "articulo.color, " .
            "articulo.cantidad, " .
            "articulo.placas, " .
            "articulo.observaciones, " .
            "articulo.disponibilidad, " .
            "estado.nombre AS 'estado_nombre', " .
            "area.nombre AS 'area_nombre', " .
            "departamento.nombre AS 'departamento_nombre', " .
            "edificio.nombre AS 'edificio_nombre', " .
            "oficina.nombre AS 'oficina_nombre', " .
            "foto.image AS 'foto_nombre' ".
            "FROM articulo,estado,area,departamento,edificio,oficina,users,revision,foto " .
            "WHERE articulo.vigencia = 1 " .
            "AND area.id = departamento.fk_area " .
            "AND departamento.id = articulo.fk_departamento " .
            "AND edificio.id = oficina.fk_edificio " .
            "AND oficina.id = articulo.fk_oficina " .
            "AND articulo.fk_estado = estado.id " .
            "AND articulo.fk_revision = revision.id " .
            "AND foto.id = articulo.fk_foto " .
            "AND revision.fk_user = users.id " .
            "AND revision.id = ".$request->query('revision')."  " .
            "ORDER BY articulo.etiqueta_local");
        return response()->json($query, 201);
    }

    public function ComprobarArticuloExiste(Request $request)
    {
        $query = DB::table('articulo')
                ->where('vigencia', 1)
                ->where('etiqueta_local', $request->query('etiqueta_local'))
                ->count() > 0;
        return response()->json($query, 201);
    }

    public function ObtenerDisponibilidadArticulo(Request $request)
    {
        $query  = DB::table('articulo')
            ->where('etiqueta_local', $request->query('etiqueta_local'))
            ->pluck('disponibilidad')
            ->first();
        return response()->json($query, 201);
    }

    public function ComprobarArticuloPerteneceRevision(Request $request){

        $query  = DB::table('articulo')
                ->join('revision', 'articulo.fk_revision', '=', 'revision.id')
                ->join('users', 'revision.fk_user', '=', 'users.id')
                ->where('users.work_id', "".$request->query("work_id")."")
                ->where('etiqueta_local', "".$request->query("etiqueta_local")."")
                ->get("articulo.id")
                ->count() > 0;

        return response()->json($query, 201);
    }

    public function EditarDisponblidadArticulo(Request $request){
        $user_id = DB::table('users')
            ->where('work_id', $request->query('work_id'))
            ->pluck('id')
            ->first();

        $query = DB::update(
                "UPDATE articulo set".
                " disponibilidad = '".$request->query('disponibilidad')."', ".
                "disponibilidad_updated_by = ".$user_id." , ".
                "disponibilidad_updated_at = '" .date("Y-m-d h:i:s")."' ".
                "WHERE etiqueta_local = '".$request->query("etiqueta_local")."'") == 1;
        return response()->json($query, 201);
    }

    public function EditarDetallesArticulo(Request $request){
        $user_id = DB::table('users')
            ->where('work_id', $request->query('work_id'))
            ->pluck('id')
            ->first();

        $query = DB::update(
                "UPDATE articulo set".
                " fk_estado = ".$request->query('estado').", ".
                "observaciones = '".$request->query('observaciones')."', ".
                "updated_by = ".$user_id.", ".
                "fk_oficina = ".$request->query('oficina')." ".
                "WHERE etiqueta_local = '".$request->query("etiqueta_local")."'") == 1;

        return response()->json($query, 201);
    }
}
