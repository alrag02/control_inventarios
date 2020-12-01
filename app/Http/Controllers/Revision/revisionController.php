<?php

namespace App\Http\Controllers\Revision;

use App\Http\Controllers\Controller;
use App\Models\Inmobiliario\area;
use App\Models\Inmobiliario\articulo;
use App\Models\Inmobiliario\departamento;
use App\Models\Inmobiliario\edificio;
use App\Models\Inmobiliario\empleado;
use App\Models\Inmobiliario\encargo;
use App\Models\Inmobiliario\estado;
use App\Models\Inmobiliario\familia;
use App\Models\Inmobiliario\oficina;
use App\Models\Inmobiliario\tipo_compra;
use App\Models\Inmobiliario\tipo_equipo;
use App\Models\Revision\corte;
use App\Models\Revision\disponibilidad_articulo;
use App\Models\Revision\revision;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class revisionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('revision.revision.index', [
            'revision' => revision::all(),
            'user' => user::all(),
            'corte' => corte::all()
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('revision.revision.create', [
            'revision' => revision::all(),
            'user' => User::all(),
            'corte' => corte::all(),
            'departamento' => departamento::all()
        ]);
    }

    /*
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Almacenar las revisiones
        $data = new revision();
        $data->fk_user = $request->fk_user;
        $data->fk_corte = corte::latest()->first()['id'];
        if ($data->save()){
            //Asignar las revisiones (faltan algunos parametros)
            //                     ->whereBetween('fecha_adquisiscion', array($request->fk_fecha_adquisiscion_inicio, $request->fk_fecha_adquisiscion_final ))
            foreach (
                articulo::where('fk_departamento', $request->fk_departamento)
                    ->get() as $disp_art){
                if ($disp_art->disponibilidad != 'revisado'){
                    $disp_art->disponibilidad = 'en_revision';
                    $disp_art->disponibilidad_updated_at = date("Y-m-d h:i:s");
                }
                $disp_art->fk_revision = $data->id;
                $disp_art->timestamps = false;
                $disp_art->save();
            }
            return redirect("revision/revision")->with('message', 'Modificado Correctamente');
        }else{
            return view("revision.revision.edit");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Revision\revision  $revision
     * @return \Illuminate\Http\Response
     */
    public function show(revision $revision)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Revision\revision  $revision
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('revision.revision.edit', [
            'articulo' => articulo::where('fk_revision', $id)->get(),
            'area' => area::get(['id', 'nombre', 'vigencia'])->where('vigencia',1),
            'departamento' => departamento::all(),
            'familia' => familia::get(['id', 'nombre', 'vigencia'])->where('vigencia',1),
            'empleado' => empleado::all(),
            'encargo' => encargo::all(),
            'estado' => estado::get(['id', 'nombre', 'vigencia'])->where('vigencia',1),
            'tipo_compra' => tipo_compra::get(['id', 'nombre', 'vigencia'])->where('vigencia',1),
            'tipo_equipo' => tipo_equipo::get(['id', 'nombre', 'vigencia'])->where('vigencia',1),
            'oficina' => oficina::get(['id', 'nombre', 'vigencia'])->where('vigencia',1),
            'edificio' => edificio::get(['id', 'nombre', 'vigencia'])->where('vigencia',1),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Revision\revision  $revision
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, revision $revision)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Revision\revision  $revision
     * @return \Illuminate\Http\Response
     */
    public function destroy(revision $revision)
    {
        //
    }

    public function show_detalis($id)
    {
        $articulo_has_empleado = DB::select("SELECT
        encargo.nombre AS 'encargo_nombre',
        empleado.nombre,
        empleado.apellido_paterno,
        empleado.apellido_materno,
        empleado.nivel,
        articulo_has_empleado.fk_articulo AS 'fk_articulo'
        FROM articulo_has_empleado, empleado, encargo
        WHERE articulo_has_empleado.fk_encargo = encargo.id
        AND articulo_has_empleado.fk_empleado = empleado.id");



        return view('revision.revision.show_details', [
            'articulo' => articulo::where('fk_revision', $id)->get(),
            'area' => area::get(['id', 'nombre', 'vigencia'])->where('vigencia',1),
            'departamento' => departamento::all(),
            'familia' => familia::get(['id', 'nombre', 'vigencia'])->where('vigencia',1),
            'empleado' => empleado::all(),
            'encargo' => encargo::all(),
            'estado' => estado::get(['id', 'nombre', 'vigencia'])->where('vigencia',1),
            'tipo_compra' => tipo_compra::get(['id', 'nombre', 'vigencia'])->where('vigencia',1),
            'tipo_equipo' => tipo_equipo::get(['id', 'nombre', 'vigencia'])->where('vigencia',1),
            'oficina' => oficina::get(['id', 'nombre', 'vigencia'])->where('vigencia',1),
            'edificio' => edificio::get(['id', 'nombre', 'vigencia'])->where('vigencia',1),
            'articulo_has_empleado' => $articulo_has_empleado,
            'revision' => revision::all(),
        ]);
    }
}
