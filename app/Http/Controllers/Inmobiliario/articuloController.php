<?php

namespace App\Http\Controllers\Inmobiliario;

use App\Http\Controllers\Controller;
use App\Models\inmobiliario\foto;
use App\Models\Revision\revision;
use App\Models\Inmobiliario\articulo;
use App\Models\Inmobiliario\area;
use App\Models\Inmobiliario\departamento;
use App\Models\Inmobiliario\empleado;
use App\Models\Inmobiliario\estado;
use App\Models\Inmobiliario\familia;
use App\Models\Inmobiliario\oficina;
use App\Models\Inmobiliario\tipo_compra;
use App\Models\Inmobiliario\tipo_equipo;
use App\Models\Inmobiliario\edificio;

use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use Milon\Barcode\DNS1D;

class articuloController extends Controller
{
    public function index()
    {
        /*$articulo_has_empleado = DB::select("SELECT
        encargo.nombre AS 'encargo_nombre',
        empleado.nombre,
        empleado.apellido_paterno,
        empleado.apellido_materno,
        empleado.nivel,
        articulo_has_empleado.fk_articulo AS 'fk_articulo'
        FROM articulo_has_empleado, empleado, encargo
        WHERE articulo_has_empleado.fk_encargo = encargo.id
        AND articulo_has_empleado.fk_empleado = empleado.id");
        */

        //$empleado = DB::select("SELECT empleado.nombre as 'nombre', empleado.apellido_paterno, empleado.apellido_materno, empleado.nivel FROM empleado");

        return view('inmobiliario.articulo.index', [
            'articulo' => articulo::all(),
            'area' => area::get(['id', 'nombre', 'vigencia']),
            'departamento' => departamento::all(),
            'familia' => familia::get(['id', 'nombre', 'vigencia']),
            'empleado' => empleado::all(),
            'estado' => estado::get(['id', 'nombre', 'vigencia']),
            'foto' => foto::all(),
            'tipo_compra' => tipo_compra::get(['id', 'nombre', 'vigencia']),
            'tipo_equipo' => tipo_equipo::get(['id', 'nombre', 'vigencia']),
            'oficina' => oficina::get(['id', 'nombre', 'vigencia']),
            'edificio' => edificio::get(['id', 'nombre', 'vigencia']),
            'revision' => revision::all(),
        ]);
    }

    public function search(){
        return view('inmobiliario.articulo.search');
    }

    public function show_search(){

        return view('inmobiliario.articulo.index', [
            'articulo' => articulo::where('id', 2)->get(),
            'area' => area::get(['id', 'nombre', 'vigencia']),
            'departamento' => departamento::all(),
            'familia' => familia::get(['id', 'nombre', 'vigencia']),
            'empleado' => empleado::all(),
            'estado' => estado::get(['id', 'nombre', 'vigencia']),
            'foto' => foto::all(),
            'tipo_compra' => tipo_compra::get(['id', 'nombre', 'vigencia']),
            'tipo_equipo' => tipo_equipo::get(['id', 'nombre', 'vigencia']),
            'oficina' => oficina::get(['id', 'nombre', 'vigencia']),
            'edificio' => edificio::get(['id', 'nombre', 'vigencia']),
            'revision' => revision::all(),
        ]);
    }

    public function create()
    {
        return view('inmobiliario.articulo.create', [
            'articulo' => articulo::all()->where('vigencia',1),
            'area' => area::get(['id', 'nombre', 'vigencia'])->where('vigencia',1),
            'departamento' => departamento::all()->where('vigencia',1),
            'familia' => familia::get(['id', 'nombre', 'vigencia'])->where('vigencia',1),
            'estado' => estado::get(['id', 'nombre', 'vigencia'])->where('vigencia',1),
            'foto' => foto::all(),
            'tipo_compra' => tipo_compra::get(['id', 'nombre', 'sigla' ,'vigencia'])->where('vigencia',1),
            'tipo_equipo' => tipo_equipo::get(['id', 'nombre', 'sigla' , 'vigencia'])->where('vigencia',1),
            'oficina' => oficina::all()->where('vigencia',1),
            'edificio' => edificio::get(['id', 'nombre', 'vigencia'])->where('vigencia',1),
            'empleado' => empleado::get(['id', 'nombre', 'apellido_paterno','apellido_materno', 'vigencia'])->where('vigencia',1),
            //'encargo' => encargo::get(['id', 'nombre', 'vigencia'])->where('vigencia',1),
        ]);

    }

    public function store(Request $request)
    {
        $data = new articulo();

        $data->etiqueta_externa = $request->etiqueta_externa;
        $data->concepto = $request->concepto;
        $data->marca = $request->marca;
        $data->modelo = $request->modelo;
        $data->descripcion = $request->descripcion;
        $data->numero_serie = $request->numero_serie;
        $data->color = $request->color;
        $data->cantidad = $request->cantidad;
        $data->placas = $request->placas;
        $data->vigencia = $request->vigencia;
        $data->observaciones = $request->observaciones;
        $data->fecha_adquisiscion = $request->fecha_adquisiscion;
        $data->costo = $request->costo;
        $data->num_factura = $request->num_factura;
        $data->activo_resguardo = $request->activo_resguardo;

        $data->empleado_encargado_area = $request->empleado_encargado_area;
        $data->empleado_titular = $request->empleado_titular;
        $data->empleado_titular_secundario = $request->empleado_titular_secundario;
        $data->empleado_resguardo = $request->empleado_resguardo;
        $data->empleado_resguardo_secundario = $request->empleado_resguardo_secundario;

        $data->fk_familia = $request->fk_familia;
        $data->fk_departamento = $request->fk_departamento;
        $data->fk_estado = $request->fk_estado;
        $data->fk_tipo_compra = $request->fk_tipo_compra;
        $data->fk_tipo_equipo = $request->fk_tipo_equipo;
        $data->fk_oficina = $request->fk_oficina;

        //Generar codigo interno
        $data->etiqueta_local = 'ITSLM-'.
            substr( $data->fecha_adquisiscion->year, -2).
            '-'.
            $data->tipo_compra->sigla.
            '-'.
            $data->tipo_equipo->sigla.
            '-'.
            mt_rand(1000,9999);

        $data->fk_revision = null;
        $data->disponibilidad = 'sin_revisar';
        $data->disponibilidad_updated_at = null;

        return $data->save() ? redirect("inmobiliario/articulo")->with('message', 'Agregado Correctamente'): view("inmobiliario.articulo.create")->with('message', 'Error');;
    }

    public function show($id)
    {
        return articulo::find($id);
    }

    public function edit($id)
    {

        return view('inmobiliario.articulo.edit',[
            'articulo' => articulo::find($id),
            'area' => area::get(['id', 'nombre', 'vigencia'])->where('vigencia',1),
            'departamento' => departamento::all()->where('vigencia',1),
            'familia' => familia::get(['id', 'nombre', 'vigencia'])->where('vigencia',1),
            'estado' => estado::all()->where('vigencia',1),
            'foto' => foto::all(),
            'tipo_compra' => tipo_compra::get(['id', 'nombre', 'sigla' ,'vigencia'])->where('vigencia',1),
            'tipo_equipo' => tipo_equipo::get(['id', 'nombre', 'sigla' , 'vigencia'])->where('vigencia',1),
            'oficina' => oficina::all()->where('vigencia',1),
            'edificio' => edificio::get(['id', 'nombre', 'vigencia'])->where('vigencia',1),
            'empleado' => empleado::get(['id', 'nombre', 'apellido_paterno','apellido_materno', 'vigencia'])->where('vigencia',1),
            //'encargo' => encargo::get(['id', 'nombre', 'vigencia'])->where('vigencia',1),
            'dns1d' => (new DNS1D)->getBarcodeHTML($id, 'C128'),
            //'articulo_has_empleado' => $articulo_has_empleado,
        ]);

    }

    public function update(Request $request, $id)
    {
        $data = articulo::find($id);
        //$data->etiqueta_local = $request->etiqueta_local;
        $data->etiqueta_externa = $request->etiqueta_externa;
        $data->concepto = $request->concepto;
        $data->marca = $request->marca;
        $data->modelo = $request->modelo;
        $data->descripcion = $request->descripcion;
        $data->numero_serie = $request->numero_serie;
        $data->color = $request->color;
        $data->cantidad = $request->cantidad;
        $data->placas = $request->placas;
        $data->vigencia = $request->vigencia;
        $data->observaciones = $request->observaciones;
        $data->fecha_adquisiscion = $request->fecha_adquisiscion;
        $data->costo = $request->costo;
        $data->num_factura = $request->num_factura;
        $data->activo_resguardo = $request->activo_resguardo;

        $data->empleado_encargado_area = $request->empleado_encargado_area;
        $data->empleado_titular = $request->empleado_titular;
        $data->empleado_titular_secundario = $request->empleado_titular_secundario;
        $data->empleado_resguardo = $request->empleado_resguardo;
        $data->empleado_resguardo_secundario = $request->empleado_resguardo_secundario;

        //$data->fk_foto = $request->fk_foto;
        $data->fk_familia = $request->fk_familia;
        $data->fk_departamento = $request->fk_departamento;
        $data->fk_estado = $request->fk_estado;
        $data->fk_tipo_compra = $request->fk_tipo_compra;
        $data->fk_tipo_equipo = $request->fk_tipo_equipo;
        $data->fk_oficina = $request->fk_oficina;
        return $data->save() ? redirect("inmobiliario/articulo") : view("inmobiliario.articulo.edit");

    }

    public function destroy($id)
    {
        $data = articulo::find($id);
        $data->vigencia = 0;
        $data->save();
        //$data->encargo()->detach();
        return articulo::destroy($id) ? redirect("inmobiliario/articulo"): view("inmobiliario.articulo.edit", print 'Hubo un error al eliminar');
    }

    public function printPDF(){
        $pdf = PDF::make('dompdf.wrapper');
        $pdf->loadHTML('<h1>Test</h1>');
        return $pdf->stream();
    }

    public function edit_foto($id){
        return view('inmobiliario.articulo.edit_foto', [
            'articulo' => articulo::find($id),
            'foto' => foto::all(),
            'familia' => familia::get(['id', 'nombre', 'vigencia'])->where('vigencia',1),
        ]);
    }

    public function update_foto(Request $request, $id){

        $data = articulo::find($id);
        $data->fk_foto = $request->fk_foto;
        return $data->save() ? redirect("inmobiliario/articulo/".$id."/edit") : view("inmobiliario.articulo.edit_foto");

    }
}
