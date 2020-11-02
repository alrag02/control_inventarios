<?php

namespace App\Http\Controllers\Inmobiliario;

use App\Http\Controllers\Controller;
use App\Models\Inmobiliario\area;
use App\Models\Inmobiliario\departamento;
use App\Models\Inmobiliario\empleado;
use Illuminate\Http\Request;

class empleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('inmobiliario.empleado.index', [
            'empleado' => empleado::all(),
            'departamento' => departamento::get(['id', 'nombre', 'vigencia'])->where('vigencia',1),
            'area' => area::get(['id', 'nombre', 'vigencia'])->where('vigencia',1)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('inmobiliario.empleado.create',
            ['departamento' => departamento::get(['id', 'nombre', 'vigencia'])->where('vigencia',1),
                'area' => area::get(['id', 'nombre', 'vigencia'])->where('vigencia',1)
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
        $data = new empleado();
        $data->nombre = $request->nombre;
        $data->apellido_paterno = $request->apellido_paterno;
        $data->apellido_materno = $request->apellido_materno;
        $data->num_ref = $request->num_ref;
        $data->email = $request->email;
        $data->nivel = $request->nivel;
        $data->vigencia = $request->vigencia;
        $data->fk_departamento = $request->fk_departamento;
        return $data->save() ? redirect("inmobiliario/empleado") : view("inmobiliario.empleado.create");

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Inmobiliario\empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return empleado::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Inmobiliario\empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('inmobiliario.empleado.edit',["empleado" => empleado::find($id), 'departamento' => departamento::get(['id', 'nombre', 'vigencia'])->where('vigencia',1)]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Inmobiliario\empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = empleado::find($id);
        $data->nombre = $request->nombre;
        $data->apellido_paterno = $request->apellido_paterno;
        $data->apellido_materno = $request->apellido_materno;
        $data->num_ref = $request->num_ref;
        $data->email = $request->email;
        $data->nivel = $request->nivel;
        $data->vigencia = $request->vigencia;
        $data->fk_departamento = $request->fk_departamento;
        return $data->save() ? redirect("inmobiliario/empleado") : view("inmobiliario.empleado.edit");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Inmobiliario\empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = empleado::find($id);
        $data->vigencia = 0;
        $data->save();
        return empleado::destroy($id) ? redirect("inmobiliario/empleado"): view("inmobiliario.empleado.edit", print 'Hubo un error al eliminar');
    }
}
