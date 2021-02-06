<?php

namespace App\Http\Controllers\Inmobiliario;

use App\Http\Controllers\Controller;
use App\Models\Inmobiliario\estado;
use Illuminate\Http\Request;

class estadoController extends Controller
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
     * @param estadoDataTable $dataTable
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        return view('inmobiliario.estado.index', ['estado' => estado::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('inmobiliario.estado.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Obtener el dato

        $data = new estado();

        //Obtener los datos con los que se obtengan en el request

        $data->nombre = $request->nombre;
        $data->vigencia = $request->vigencia;

        //Almacenar el dato y dirigir al index con mensaje,
        // si no puede almacenar, regresar a create con mensaje de error

        return $data->save() ? redirect("inmobiliario/estado")->with('message', 'Creado Correctamente') : view("inmobiliario.estado.create");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Inmobiliario\estado  $estado
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return estado::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Inmobiliario\estado  $estado
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('inmobiliario.estado.edit',["estado" => estado::find($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Inmobiliario\estado  $estado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //Obtener el dato

        $data = estado::find($id);

        //Cambiar los datos con los que se obtengan del request en edit

        $data->nombre = $request->nombre;
        $data->vigencia = $request->vigencia;

        //Actualizar el dato y dirigir al index con mensaje,
        // si no puede actualizar, regresar a edit con mensaje de error

        return $data->save() ? redirect("inmobiliario/estado")->with('message', 'Modificado Correctamente') : view("inmobiliario.estado.edit");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Inmobiliario\estado  $estado
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Obtener el dato

        $data = estado::find($id);

        //Determinar si el dato contiene otros datos dependientes

        /*
        if( count($data->departamento) > 0 ){

            //En caso de ser ser así regresar al index con mensaje de error

            return redirect("inmobiliario/estado")->with('message', 'Tiene '.count($data->departamento).' departamentos dependientes, editelos para que no dependan de esta estado.');
        }else{

            //Dar de baja el dato antes de eliminarlo.
        */
            $data->vigencia = 0;
            $data->save();

            //Eliminar el dato y dirigir al index con mensaje,
            // si no puede eliminarlo, regresar a edit con mensaje de error

            return estado::destroy($id) ? redirect("inmobiliario/estado")->with('message', 'Elemento eliminado'): view("inmobiliario.estado.edit", print 'Hubo un error al eliminar');
        /*
        }
        */
    }
}
