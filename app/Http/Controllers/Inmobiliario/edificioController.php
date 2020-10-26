<?php

namespace App\Http\Controllers\Inmobiliario;

use App\Http\Controllers\Controller;
use App\Models\Inmobiliario\edificio;
use Illuminate\Http\Request;

class edificioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('inmobiliario.edificio.index', ['edificio' => edificio::all()]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('inmobiliario.edificio.create');
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

        $data = new edificio();

        //Obtener los datos con los que se obtengan en el request

        $data->nombre = $request->nombre;
        $data->vigencia = $request->vigencia;

        //Almacenar el dato y dirigir al index con mensaje,
        // si no puede almacenar, regresar a create con mensaje de error

        return $data->save() ? redirect("inmobiliario/edificio")->with('message', 'Creado Correctamente') : view("inmobiliario.edificio.create");

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Inmobiliario\edificio  $edificio
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return edificio::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Inmobiliario\edificio  $edificio
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('inmobiliario.edificio.edit',["edificio" => edificio::find($id)]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Inmobiliario\edificio  $edificio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //Obtener el dato

        $data = edificio::find($id);

        //Cambiar los datos con los que se obtengan del request en edit

        $data->nombre = $request->nombre;
        $data->vigencia = $request->vigencia;

        //Actualizar el dato y dirigir al index con mensaje,
        // si no puede actualizar, regresar a edit con mensaje de error

        return $data->save() ? redirect("inmobiliario/edificio")->with('message', 'Modificado Correctamente') : view("inmobiliario.edificio.edit");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Inmobiliario\edificio  $edificio
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Obtener el dato

        $data = edificio::find($id);

        //Determinar si el dato contiene otros datos dependientes

        if( count($data->oficina) > 0 ){

            //En caso de ser ser así regresar al index con mensaje de error

            return redirect("inmobiliario/edificio")->with('message', 'Tiene '.count($data->oficina).' oficinas dependientes, editelos para que no dependan de esta edificio.');
        }else{

            //Dar de baja el dato antes de eliminarlo.

            $data->vigencia = 0;
            $data->save();

            //Eliminar el dato y dirigir al index con mensaje,
            // si no puede eliminarlo, regresar a edit con mensaje de error

            return edificio::destroy($id) ? redirect("inmobiliario/edificio")->with('message', 'Elemento eliminado'): view("inmobiliario.edificio.edit", print 'Hubo un error al eliminar');
        }
    }
}
