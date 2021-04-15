<?php

namespace App\Http\Controllers\Inmobiliario;

use App\Http\Controllers\Controller;
use App\Http\Requests\inmobiliario\oficinaRequest;
use App\Models\Inmobiliario\edificio;
use App\Models\Inmobiliario\oficina;
use Illuminate\Http\Request;

class oficinaController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:crear conceptos'], ['only' => ['create', 'store']]);
        $this->middleware(['permission:editar conceptos'], ['only' => ['edit', 'update']]);
        $this->middleware(['permission:consultar conceptos'], ['only' => 'index']);
        $this->middleware(['permission:eliminar conceptos'], ['only' => 'destroy']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('inmobiliario.oficina.index', ['oficina' => oficina::all()]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('inmobiliario.oficina.create', ['edificio' => edificio::get(['id', 'nombre', 'vigencia'])->where('vigencia',1)]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(oficinaRequest $request)
    {
        $data = new oficina();
        $data->nombre = $request->nombre;
        $data->planta = $request->planta;
        $data->vigencia = $request->vigencia;
        $data->fk_edificio = $request->fk_edificio;
        return $data->save() ? redirect("inmobiliario/oficina") : view("inmobiliario.oficina.create");

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Inmobiliario\oficina  $oficina
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return oficina::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Inmobiliario\oficina  $oficina
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('inmobiliario.oficina.edit',["oficina" => oficina::find($id), 'edificio' => edificio::get(['id', 'nombre', 'vigencia'])->where('vigencia',1)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Inmobiliario\oficina  $oficina
     * @return \Illuminate\Http\Response
     */
    public function update(oficinaRequest $request, $id)
    {
        $data = oficina::find($id);
        $data->nombre = $request->nombre;
        $data->planta = $request->planta;
        $data->fk_edificio = $request->fk_edificio;
        $data->vigencia = $request->vigencia;
        return $data->save() ? redirect("inmobiliario/oficina") : view("inmobiliario.oficina.edit");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Inmobiliario\oficina  $oficina
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = oficina::find($id);
        $data->vigencia = 0;
        $data->save();
        return oficina::destroy($id) ? redirect("inmobiliario/oficina"): view("inmobiliario.oficina.edit", print 'Hubo un error al eliminar');

    }
}
