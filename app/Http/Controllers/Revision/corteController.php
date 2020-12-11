<?php

namespace App\Http\Controllers\Revision;

use App\Http\Controllers\Controller;
use App\Models\Inmobiliario\articulo;
use App\Models\Revision\corte;
use App\Models\Revision\disponibilidad_articulo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;

class corteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('revision.corte.index', ['corte' => corte::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('revision.corte.create');
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
        $data = new corte();

        //Obtener los datos con los que se obtengan en el request
        $data->nombre = $request->nombre;
        $data->descripcion = $request->descripcion;
        $data->llave = Str::random(16);

        //Almacenar el dato y dirigir al index con mensaje,
        // si no puede almacenar, regresar a create con mensaje de error

        $data->save();
        $this->store_excel_corte($data->llave);
        //Actualizar tods los articulos para que aparecan sin revisar,
        foreach (articulo::get() as $disp_art){
            $disp_art->disponibilidad = 'sin_revisar';
            $disp_art->fk_revision = null;
            $disp_art->timestamps = false;
            $disp_art->disponibilidad_updated_at = date("Y-m-d h:i:s");
            $disp_art->save();
        }
        return redirect("revision/corte")->with('message', 'Creado Correctamente');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Revision\corte  $corte
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return corte::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Revision\corte  $corte
     * @return \Illuminate\Http\Response
     */
    public function edit(corte $id)
    {
        return view('revision.corte.edit', ['corte' => corte::find($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Revision\corte  $corte
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //Obtener el dato

        $data = corte::find($id);

        //Cambiar los datos con los que se obtengan del request en edit

        $data->nombre = $request->nombre;
        $data->descripcion = $request->descripcion;

        //Actualizar el dato y dirigir al index con mensaje,
        // si no puede actualizar, regresar a edit con mensaje de error

        return $data->save() ? redirect("revision/corte")->with('message', 'Modificado Correctamente') : view("revision.corte.edit");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Revision\corte  $corte
     * @return \Illuminate\Http\Response
     */
    public function destroy(corte $corte)
    {
        echo 'No deberias de eliminar un corte';
    }

    public function store_excel_corte($llave){

        return Excel::store(new corteExportController, 'corte_inventario_'.$llave.'.xlsx', 'backups_excel');
    }

    public function get_excel_corte($llave){
        return Storage::download('/backups/excel/corte_inventario_'.$llave.'.xlsx');


    }
}
