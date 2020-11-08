<?php

namespace App\Http\Controllers\Inmobiliario;

use App\Http\Controllers\Controller;
use App\Models\Inmobiliario\articulo;
use App\Models\Inmobiliario\area;
use App\Models\Inmobiliario\departamento;
use App\Models\Inmobiliario\empleado;
use App\Models\Inmobiliario\encargo;
use App\Models\Inmobiliario\estado;
use App\Models\Inmobiliario\familia;
use App\Models\Inmobiliario\oficina;
use App\Models\Inmobiliario\tipo_compra;
use App\Models\Inmobiliario\tipo_equipo;
use App\Models\Inmobiliario\edificio;
use Illuminate\Http\Request;

class articuloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('inmobiliario.articulo.index', [
            'articulo' => articulo::all(),
            'area' => area::get(['id', 'nombre', 'vigencia'])->where('vigencia',1),
            'departamento' => departamento::all(),
            'familia' => familia::get(['id', 'nombre', 'vigencia'])->where('vigencia',1),
            'estado' => estado::get(['id', 'nombre', 'vigencia'])->where('vigencia',1),
            'tipo_compra' => tipo_compra::get(['id', 'nombre', 'vigencia'])->where('vigencia',1),
            'tipo_equipo' => tipo_equipo::get(['id', 'nombre', 'vigencia'])->where('vigencia',1),
            'oficina' => oficina::get(['id', 'nombre', 'vigencia'])->where('vigencia',1),
            'edificio' => edificio::get(['id', 'nombre', 'vigencia'])->where('vigencia',1),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('inmobiliario.articulo.create', [
            'articulo' => articulo::all(),
            'area' => area::get(['id', 'nombre', 'vigencia'])->where('vigencia',1),
            'departamento' => departamento::all(),
            'familia' => familia::get(['id', 'nombre', 'vigencia'])->where('vigencia',1),
            'estado' => estado::get(['id', 'nombre', 'vigencia'])->where('vigencia',1),
            'tipo_compra' => tipo_compra::get(['id', 'nombre', 'vigencia'])->where('vigencia',1),
            'tipo_equipo' => tipo_equipo::get(['id', 'nombre', 'vigencia'])->where('vigencia',1),
            'oficina' => oficina::get(['id', 'nombre', 'vigencia'])->where('vigencia',1),
            'edificio' => edificio::get(['id', 'nombre', 'vigencia'])->where('vigencia',1),
            'empleado' => empleado::get(['id', 'nombre', 'apellido_paterno','apellido_materno', 'vigencia'])->where('vigencia',1),
            'encargo' => encargo::get(['id', 'nombre', 'vigencia'])->where('vigencia',1),
        ]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new articulo();
        $data->etiqueta_local = $request->etiqueta_local;
        $data->etiqueta_externa = $request->etiqueta_externa;
        $data->concepto = $request->concepto;
        $data->marca = $request->marca;
        $data->modelo = $request->modelo;
        $data->descripcion = $request->descripcion;
        $data->numero_serie = $request->numero_serie;
        $data->color = $request->color;
        $data->cantidad = $request->cantidad;
        $data->placas = $request->placas;
        $data->observaciones = $request->observaciones;
        $data->fecha_adquisiscion = $request->fecha_adquisiscion;
        $data->costo = $request->costo;
        $data->num_factura = $request->num_factura;
        $data->activo_resguardo = $request->activo_resguardo;
        $data->fk_departamento = $request->fk_departamento;
        $data->fk_estado = $request->fk_estado;
        $data->fk_tipo_compra = $request->fk_tipo_compra;
        $data->fk_tipo_equipo = $request->fk_tipo_equipo;
        $data->fk_oficina = $request->fk_oficina;

        //Generar codigo interno ITSLM-01-CI-MOB-0207

        $data->etiqueta_local =
            'ITSLM-'.
            $request->fecha_adquisiscion->year.
            '-'.
            tipo_compra::get('siglas')->where('id',$request->fk_tipo_compra).
            tipo_equipo::get('siglas')->where('id',$request->fk_tipo_equipo).
            //Numeros random, provisional
            random_bytes(4)
        ;

        $data->save();

        $art = articulo::find($data->id);
        $art->encargo()->attach(1, ['fk_empleado' => $request->articulo_has_empleado_1]);
        $art->encargo()->attach(2, ['fk_empleado' => $request->articulo_has_empleado_2]);
        $art->encargo()->attach(3, ['fk_empleado' => $request->articulo_has_empleado_3]);
        $art->encargo()->attach(4, ['fk_empleado' => $request->articulo_has_empleado_4]);
        $art->encargo()->attach(5, ['fk_empleado' => $request->articulo_has_empleado_5]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Inmobiliario\articulo  $articulo
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return articulo::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Inmobiliario\articulo  $articulo
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('inmobiliario.articulo.edit',[
            'articulo' => articulo::all(),
            'area' => area::get(['id', 'nombre', 'vigencia'])->where('vigencia',1),
            'departamento' => departamento::all(),
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
     * @param  \App\Models\Inmobiliario\articulo  $articulo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = articulo::find($id);
        $data->etiqueta_local = $request->etiqueta_local;
        $data->etiqueta_externa = $request->etiqueta_externa;
        $data->concepto = $request->concepto;
        $data->marca = $request->marca;
        $data->modelo = $request->modelo;
        $data->descripcion = $request->descripcion;
        $data->numero_serie = $request->numero_serie;
        $data->color = $request->color;
        $data->cantidad = $request->cantidad;
        $data->placas = $request->placas;
        $data->observaciones = $request->observaciones;
        $data->fecha_adquisiscion = $request->fecha_adquisiscion;
        $data->costo = $request->costo;
        $data->num_factura = $request->num_factura;
        $data->activo_resguardo = $request->activo_resguardo;
        $data->fk_departamento = $request->fk_departamento;
        $data->fk_estado = $request->fk_estado;
        $data->fk_tipo_compra = $request->fk_tipo_compra;
        $data->fk_tipo_equipo = $request->fk_tipo_equipo;
        $data->fk_oficina = $request->fk_oficina;
        return $data->save() ? redirect("inmobiliario/articulo") : view("inmobiliario.articulo.edit");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Inmobiliario\articulo  $articulo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = articulo::find($id);
        $data->vigencia = 0;
        $data->save();
        return articulo::destroy($id) ? redirect("inmobiliario/articulo"): view("inmobiliario.articulo.edit", print 'Hubo un error al eliminar');
    }
}
