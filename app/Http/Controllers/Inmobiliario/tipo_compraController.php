<?php

namespace App\Http\Controllers\Inmobiliario;

use App\Http\Controllers\Controller;
use App\Models\Inmobiliario\tipo_compra;
use Illuminate\Http\Request;

class tipo_compraController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param tipo_compraDataTable $dataTable
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        return view('inmobiliario.tipo_compra.index', ['tipo_compra' => tipo_compra::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('inmobiliario.tipo_compra.create');
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

        $data = new tipo_compra();

        //Obtener los datos con los que se obtengan en el request

        $data->nombre = $request->nombre;
        $data->sigla = $request->sigla;
        $data->vigencia = $request->vigencia;

        //Almacenar el dato y dirigir al index con mensaje,
        // si no puede almacenar, regresar a create con mensaje de error

        return $data->save() ? redirect("inmobiliario/tipo_compra")->with('message', 'Creado Correctamente') : view("inmobiliario.tipo_compra.create");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Inmobiliario\tipo_compra  $tipo_compra
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return tipo_compra::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Inmobiliario\tipo_compra  $tipo_compra
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('inmobiliario.tipo_compra.edit',["tipo_compra" => tipo_compra::find($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Inmobiliario\tipo_compra  $tipo_compra
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //Obtener el dato

        $data = tipo_compra::find($id);

        //Cambiar los datos con los que se obtengan del request en edit

        $data->nombre = $request->nombre;
        $data->sigla = $request->sigla;
        $data->vigencia = $request->vigencia;

        //Actualizar el dato y dirigir al index con mensaje,
        // si no puede actualizar, regresar a edit con mensaje de error

        return $data->save() ? redirect("inmobiliario/tipo_compra")->with('message', 'Modificado Correctamente') : view("inmobiliario.tipo_compra.edit");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Inmobiliario\tipo_compra  $tipo_compra
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Obtener el dato

        $data = tipo_compra::find($id);

        //Determinar si el dato contiene otros datos dependientes

        /*
        if( count($data->tipo_compra_has_articulo) > 0 ){

            //En caso de ser ser así regresar al index con mensaje de error

            return redirect("inmobiliario/tipo_compra")->with('message', 'Tiene '.count($data->tipo_compra_has_articulo).' tipo_compra_has_articulos dependientes, editelos para que no dependan de esta tipo_compra.');
        }else{

            //Dar de baja el dato antes de eliminarlo.
        */
        $data->vigencia = 0;
        $data->save();

        //Eliminar el dato y dirigir al index con mensaje,
        // si no puede eliminarlo, regresar a edit con mensaje de error

        return tipo_compra::destroy($id) ? redirect("inmobiliario/tipo_compra")->with('message', 'Elemento eliminado'): view("inmobiliario.tipo_compra.edit", print 'Hubo un error al eliminar');
        /*
        }
        */
    }
}
