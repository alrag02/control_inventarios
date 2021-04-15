<?php

namespace App\Http\Controllers\Revision;

use App\Http\Controllers\Controller;
use App\Http\Requests\revision\revisionRequest;
use App\Models\Inmobiliario\area;
use App\Models\Inmobiliario\articulo;
use App\Models\Inmobiliario\departamento;
use App\Models\Inmobiliario\edificio;
use App\Models\Inmobiliario\empleado;
use App\Models\Inmobiliario\encargo;
use App\Models\Inmobiliario\estado;
use App\Models\Inmobiliario\familia;
use App\Models\Inmobiliario\oficina;
use App\Models\Inmobiliario\tipo_compra;
use App\Models\Inmobiliario\tipo_equipo;
use App\Models\Revision\articulo_has_revision;
use App\Models\Revision\corte;
use App\Models\Revision\disponibilidad_articulo;
use App\Models\Revision\revision;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;


class revisionController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:revisar inventarios'], ['only' => ['index', 'create', 'store', 'edit', 'update', 'destroy', 'show_detalis', 'get_excel_revision', 'cambiar_disponibilidad_articulo']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('revision.revision.index', [
            'revision' => revision::all(),
            'user' => user::all(),
            'corte' => corte::all()
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('revision.revision.create', [
            'revision' => revision::all(),
            'user' => User::all(),
            'corte' => corte::all(),
            'departamento' => departamento::all(),
            'oficina' => oficina::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(revisionRequest $request)
    {
        //Almacenar las revisiones
        $data = new revision();

        //Almacenar el usuario al que se le asignan las revisiones
        $data->fk_user = $request->fk_user;

        //Asignarle a qué corte pertenece esta revision, siempre será el más reciente
        $data->fk_corte = corte::latest()->first()['id'];

        //Asignarle la oficina
        $data->fk_oficina = $request->fk_oficina;

        //Decirle que esta revision está vigente
        $data->vigencia  = 1;

        //Guardar datos en revision, ahora modifica los artículos
        if ($data->save()){

            //Por cada artículo dentro de la oficna asignada
            foreach (
                articulo::where('fk_oficina', $request->fk_oficina)
                    ->where('vigencia',1)
                    ->get() as $disp_art){

                //Guardar en tabla articulo_has_revision
                $ahr = new articulo_has_revision();
                $ahr->fk_revision = $data->id;
                $ahr->fk_articulo = $disp_art->id;
                $ahr->save();

                //Si no ha sido revisado anteriormente, decirle que está en revision
                //Ademas de agregarle la hora y fecha del cambio de disponibilidad
                if ($disp_art->disponibilidad != 'revisado'){
                    $disp_art->disponibilidad = 'en_revision';
                    $disp_art->disponibilidad_updated_at = date("Y-m-d h:i:s");
                }

                //Almacena el id de la revision recien creada
                $disp_art->fk_revision = $data->id;

                //Debido a que no se está modificando el artículo, sino solo su estado, desactivar timestamps
                $disp_art->timestamps = false;
                $disp_art->save();
            }
            return redirect("revision/revision")->with('message', 'Modificado Correctamente');
        }else{
            return view("revision.revision.edit");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Revision\revision  $revision
     * @return \Illuminate\Http\Response
     */
    public function show(revision $revision)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Revision\revision  $revision
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('revision.revision.edit', [
            'articulo' => articulo::where('fk_revision', $id)->get(),
            'area' => area::get(['id', 'nombre', 'vigencia'])->where('vigencia',1),
            'departamento' => departamento::all(),
            'familia' => familia::get(['id', 'nombre', 'vigencia'])->where('vigencia',1),
            'empleado' => empleado::all(),
            'encargo' => encargo::all(),
            'estado' => estado::get(['id', 'nombre', 'vigencia'])->where('vigencia',1),
            'tipo_compra' => tipo_compra::get(['id', 'nombre', 'vigencia'])->where('vigencia',1),
            'tipo_equipo' => tipo_equipo::get(['id', 'nombre', 'vigencia'])->where('vigencia',1),
            'oficina' => oficina::get(['id', 'nombre', 'vigencia'])->where('vigencia',1),
            'edificio' => edificio::get(['id', 'nombre', 'vigencia'])->where('vigencia',1),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Revision\revision  $revision
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, revision $revision)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Revision\revision  $revision
     * @return \Illuminate\Http\Response
     */
    public function destroy(revision $revision)
    {
        //
    }

    public function show_detalis($id)
    {
        return view('revision.revision.show_details', [
            'articulo' => articulo::where('fk_revision', $id)->get(),
            'area' => area::get(['id', 'nombre', 'vigencia']),
            'departamento' => departamento::all(),
            'familia' => familia::get(['id', 'nombre', 'vigencia']),
            'empleado' => empleado::all(),
            'estado' => estado::get(['id', 'nombre', 'vigencia']),
            'tipo_compra' => tipo_compra::get(['id', 'nombre', 'vigencia']),
            'tipo_equipo' => tipo_equipo::get(['id', 'nombre', 'vigencia']),
            'oficina' => oficina::get(['id', 'nombre', 'vigencia']),
            'edificio' => edificio::get(['id', 'nombre', 'vigencia']),
            'revision' => revision::all(),
            'user' => user::all(),

        ]);
    }

    public function get_excel_revision(Request $request, $id){


        $area = DB::table('area')
                ->join('departamento', 'area.id', '=', 'departamento.fk_area')
                ->join('revision', 'departamento.id', '=', 'revision.fk_departamento')
                ->where('revision.id', $id)
                ->pluck("area.nombre")
                ->first();

        $departamento = DB::table('departamento')
            ->join('revision', 'departamento.id', '=', 'revision.fk_departamento')
            ->where('revision.id', $id)
            ->pluck("departamento.nombre")
            ->first();

        $elaboro = $request->elaboro;
        $autorizo = $request->autorizo;
        $responsable_area = $request->responsable_area;
        $responsable = $request->responsable;
        $resguardante = $request->resguardante;
        $visto_bueno = $request->visto_bueno;

        return Excel::download(new revisionExportController($id, $area, $departamento, $elaboro, $autorizo, $responsable_area, $responsable, $resguardante, $visto_bueno),''.date("Y-m-d_h:i:s").'_reporte_'.$id.'.xlsx');
    }

    public function cambiar_disponibilidad_articulo(Request $request, $id){
        $data = articulo::find($id);
        $data->disponibilidad = $request->disponibilidad;
        $data->timestamps = false;
        $data->disponibilidad_updated_at = date("Y-m-d h:i:s");
        $data->disponibilidad_updated_by = Auth::id();

        return $data->save() ? back() : view("revision.revision.show_details");

    }
}
