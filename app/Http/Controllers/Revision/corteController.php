<?php

namespace App\Http\Controllers\Revision;

use App\Http\Controllers\Controller;
use App\Http\Requests\revision\corteRequest;
use App\Models\Inmobiliario\articulo;
use App\Models\Revision\corte;
use App\Models\Revision\disponibilidad_articulo;
use App\Models\Revision\revision;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;

class corteController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:crear cortes'], ['only' => ['create', 'store', 'edit', 'update']]);
        $this->middleware(['permission:consultar cortes'], ['only' => ['index', 'store_excel_corte', 'get_excel_corte']]);
    }
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
    public function store(corteRequest $request)
    {
        //Obtener el dato
        $data = new corte();

        //Obtener los datos con los que se obtengan en el request
        $data->nombre = $request->nombre;
        $data->descripcion = $request->descripcion;
        $data->llave = Str::random(16);

        //Almacenar el dato y dirigir al index con mensaje,
        // si no puede almacenar, regresar a create con mensaje de error

        if ($data->save()){
            $this->store_excel_corte($data->llave);

            //Invalidar todos las revisiones anteriores
            $this->invalidadRevisionesAnteriores();

            //Actualizar tods los articulos para que aparecan sin revisar,
            $this->ponerArticulosSinRevisar();

            return redirect("revision/corte")->with('message', 'Creado Correctamente');

        }else{
            return redirect("revision/corte/create")->with('message', 'Hubo un error');
        }
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
    public function update(corteRequest $request, $id)
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

    public function invalidadRevisionesAnteriores()
    {
        foreach (revision::all() as $data){
            $data->vigencia = 0;
            $data->save();
        }
    }

   public function ponerArticulosSinRevisar(){
       foreach (articulo::get() as $data){

           //Reiniciar disponibilidad
           $data->disponibilidad = 'sin_revisar';

           //Quitale la revision que estaba asignada
           $data->fk_revision = null;

           //No aplicar los timestamps, porque no se modifican los datos del artículo, solo su disponibilidad
           $data->timestamps = false;

           //Actualizar fecha, hora y usuario responsable
           $data->disponibilidad_updated_at = date("Y-m-d h:i:s");
           $data->disponibilidad_updated_by = Auth::id();

           $data->save();
       }

   }

    public function store_excel_corte($llave){

        return Excel::store(new corteExportController, 'corte_inventario_'.$llave.'.xlsx', 'backups_excel');
    }

    public function get_excel_corte($llave){
        return Storage::download('/backups/excel/corte_inventario_'.$llave.'.xlsx');


    }
}
