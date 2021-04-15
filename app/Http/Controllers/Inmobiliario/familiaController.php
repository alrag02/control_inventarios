<?php

namespace App\Http\Controllers\Inmobiliario;

use App\Http\Controllers\Controller;
use App\Http\Requests\inmobiliario\familiaRequest;
use App\Models\Inmobiliario\familia;
use Illuminate\Http\Request;

class familiaController extends Controller
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
     * @param familiaDataTable $dataTable
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        return view('inmobiliario.familia.index', ['familia' => familia::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('inmobiliario.familia.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(familiaRequest $request)
    {
        //Obtener el dato

        $data = new familia();

        //Obtener los datos con los que se obtengan en el request

        $data->nombre = $request->nombre;
        $data->sigla = $request->sigla;
        $data->vigencia = $request->vigencia;

        //Almacenar el dato y dirigir al index con mensaje,
        // si no puede almacenar, regresar a create con mensaje de error

        return $data->save() ? redirect("inmobiliario/familia")->with('message', 'Creado Correctamente') : view("inmobiliario.familia.create");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Inmobiliario\familia  $familia
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return familia::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Inmobiliario\familia  $familia
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('inmobiliario.familia.edit',["familia" => familia::find($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Inmobiliario\familia  $familia
     * @return \Illuminate\Http\Response
     */
    public function update(familiaRequest $request, $id)
    {
        //Obtener el dato

        $data = familia::find($id);

        //Cambiar los datos con los que se obtengan del request en edit

        $data->nombre = $request->nombre;
        $data->sigla = $request->sigla;
        $data->vigencia = $request->vigencia;

        //Actualizar el dato y dirigir al index con mensaje,
        // si no puede actualizar, regresar a edit con mensaje de error

        return $data->save() ? redirect("inmobiliario/familia")->with('message', 'Modificado Correctamente') : view("inmobiliario.familia.edit");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Inmobiliario\familia  $familia
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Obtener el dato

        $data = familia::find($id);

        //Determinar si el dato contiene otros datos dependientes
        //Dar de baja el dato antes de eliminarlo.

        $data->vigencia = 0;
        $data->save();

        //Eliminar el dato y dirigir al index con mensaje,
        // si no puede eliminarlo, regresar a edit con mensaje de error

        return familia::destroy($id) ? redirect("inmobiliario/familia")->with('message', 'Elemento eliminado'): view("inmobiliario.familia.edit", print 'Hubo un error al eliminar');
        /*
        }
        */
    }
}
