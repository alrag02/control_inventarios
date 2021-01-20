<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class apiController extends Controller
{
    private function validatepassword($password, $correct_hash){

    }

    public function login(Request $request){


        $query = DB::table('users')->where('work_id', $request->query('work_id'))->where('password', $request->query('password'))->count() > 0;
        return response()->json($query, 201);
    }

    public function ConsultarArticulosPorWorkId(Request $request)
    {
        return DB::select("SELECT ".
                    "articulo.id, " .
                    "articulo.etiqueta_local, " .
                    "articulo.etiqueta_externa, " .
                    "articulo.concepto, " .
                    "articulo.marca, " .
                    "articulo.modelo, " .
                    "articulo.disponibilidad, " .
                    "estado.nombre AS 'estado_nombre' " .
                    "FROM articulo,revision,users,estado " .
                    "WHERE articulo.vigencia = 1 " .
                    "AND articulo.fk_estado = estado.id " .
                    "AND articulo.fk_revision = revision.id " .
                    "AND revision.fk_user = users.id " .
                    "AND users.work_id = '" . $request->query('work_id') . "'")
            ;
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
            "estado.nombre AS 'estado_nombre', " .
            "area.nombre AS 'area_nombre', " .
            "departamento.nombre AS 'departamento_nombre', " .
            "edificio.nombre AS 'edificio_nombre', " .
            "oficina.nombre AS 'oficina_nombre' " .
            "FROM articulo,estado,area,departamento,edificio,oficina " .
            "WHERE articulo.vigencia = 1 " .
            "AND area.id = departamento.fk_area " .
            "AND departamento.id = articulo.fk_departamento " .
            "AND edificio.id = oficina.fk_edificio " .
            "AND oficina.id = articulo.fk_oficina " .
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
                "articulo.disponibilidad, " .
                "estado.nombre AS 'estado_nombre' " .
                "FROM articulo,revision,users,estado " .
                "WHERE articulo.vigencia = 1 " .
                "AND articulo.fk_estado = estado.id " .
                "AND articulo.fk_revision = revision.id " .
                "AND revision.id = ".$request->query('revision')." ");
        return response()->json($query, 201);
    }

    public function ComprobarArticuloExiste(Request $request)
    {
        $query = DB::table('articulo')
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
        $query = DB::table('articulo')
                ->where('etiqueta_local', $request->query('etiqueta_local'))
                ->where('work_id', $request->query('work_id'))
                ->count() > 0;
        return response()->json($query, 201);
    }

    public function EditarDisponblidadArticulo(Request $request){
        $query = DB::update(
            "UPDATE articulo set".
                " disponibilidad = '".$request->query('disponibilidad')."', ".
                "disponibilidad_updated_at = '" .date("Y-m-d h:i:s")."' ".
                "WHERE etiqueta_local = '".$request->query("etiqueta_local")."'");
        return response()->json($query, 201);
    }
}
