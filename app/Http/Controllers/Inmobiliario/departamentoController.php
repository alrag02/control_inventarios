<?php

namespace App\Http\Controllers\Inmobiliario;

use App\Http\Controllers\Controller;
use App\Models\Inmobiliario\area;
use App\Models\Inmobiliario\departamento;
use Illuminate\Http\Request;

class departamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('inmobiliario.departamento.index', ['departamento' => departamento::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('inmobiliario.departamento.create', ['area' => area::get(['id', 'nombre', 'vigencia'])->where('vigencia',1)]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new departamento();
        $data->nombre = $request->nombre;
        $data->vigencia = $request->vigencia;
        $data->fk_area = $request->fk_area;
        return $data->save() ? redirect("inmobiliario/departamento") : view("inmobiliario.departamento.create");

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Inmobiliario\departamento  $departamento
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return departamento::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Inmobiliario\departamento  $departamento
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('inmobiliario.departamento.edit',["departamento" => departamento::find($id), 'area' => area::get(['id', 'nombre', 'vigencia'])->where('vigencia',1)]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Inmobiliario\departamento  $departamento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = departamento::find($id);
        $data->nombre = $request->nombre;
        $data->fk_area = $request->fk_area;
        $data->vigencia = $request->vigencia;
        return $data->save() ? redirect("inmobiliario/departamento") : view("inmobiliario.departamento.edit");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Inmobiliario\departamento  $departamento
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = departamento::find($id);
        $data->vigencia = 0;
        $data->save();
        return departamento::destroy($id) ? redirect("inmobiliario/departamento"): view("inmobiliario.departamento.edit", print 'Hubo un error al eliminar');
    }
}
