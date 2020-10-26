<?php

namespace App\Http\Controllers\Inmobiliario;

use App\Http\Controllers\Controller;
use App\Models\Inmobiliario\area;
use Illuminate\Http\Request;


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
        //Obtener el dato

        $data = new area();

        //Obtener los datos con los que se obtengan en el request

        $data->nombre = $request->nombre;
        $data->vigencia = $request->vigencia;

        //Almacenar el dato y dirigir al index con mensaje,
        // si no puede almacenar, regresar a create con mensaje de error

        return $data->save() ? redirect("inmobiliario/area")->with('message', 'Creado Correctamente') : view("inmobiliario.area.create");
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
        //Obtener el dato

        $data = area::find($id);

        //Cambiar los datos con los que se obtengan del request en edit

        $data->nombre = $request->nombre;
        $data->vigencia = $request->vigencia;

        //Actualizar el dato y dirigir al index con mensaje,
        // si no puede actualizar, regresar a edit con mensaje de error

        return $data->save() ? redirect("inmobiliario/area")->with('message', 'Modificado Correctamente') : view("inmobiliario.area.edit");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Inmobiliario\area  $area
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Obtener el dato

        $data = area::find($id);

        //Determinar si el dato contiene otros datos dependientes

        if( count($data->departamento) > 0 ){

            //En caso de ser ser así regresar al index con mensaje de error

            return redirect("inmobiliario/area")->with('message', 'Tiene '.count($data->departamento).' departamentos dependientes, editelos para que no dependan de esta area.');
        }else{

            //Dar de baja el dato antes de eliminarlo.

            $data->vigencia = 0;
            $data->save();

            //Eliminar el dato y dirigir al index con mensaje,
            // si no puede eliminarlo, regresar a edit con mensaje de error

            return area::destroy($id) ? redirect("inmobiliario/area")->with('message', 'Elemento eliminado'): view("inmobiliario.area.edit", print 'Hubo un error al eliminar');
        }
    }
}

