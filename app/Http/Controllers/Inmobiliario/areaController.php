<?php

namespace App\Http\Controllers\Inmobiliario;

use App\Http\Controllers\Controller;
use App\Models\Inmobiliario\area;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class areaController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param areaDataTable $dataTable
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        return view('inmobiliario.area.index', ['area' => area::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('inmobiliario.area.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new area();
        $data->nombre = $request->nombre;
        $data->vigencia = $request->vigencia;
        return $data->save() ? redirect("inmobiliario/area") : view("inmobiliario.area.create");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Inmobiliario\area  $area
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return area::find($id);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Inmobiliario\area  $area
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('inmobiliario.area.edit',["area" => area::find($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Inmobiliario\area  $area
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = area::find($id);
        $data->nombre = $request->nombre;
        $data->vigencia = $request->vigencia;
        return $data->save() ? redirect("inmobiliario/area") : view("inmobiliario.area.edit");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Inmobiliario\area  $area
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $data = area::find($id);
        $data->vigencia = 0;
        $data->save();
        return area::destroy($id) ? redirect("inmobiliario/area"): view("inmobiliario.area.edit", print 'Hubo un error al eliminar');
    }
}

