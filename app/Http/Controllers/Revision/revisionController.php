<?php

namespace App\Http\Controllers\Revision;

use App\Http\Controllers\Controller;
use App\Models\Inmobiliario\articulo;
use App\Models\Inmobiliario\departamento;
use App\Models\Revision\corte;
use App\Models\Revision\disponibilidad_articulo;
use App\Models\Revision\revision;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class revisionController extends Controller
{
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
            'departamento' => departamento::all()
        ]);
    }

    /*
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Almacenar las revisiones
        $data = new revision();
        $data->fk_user = $request->fk_user;
        $data->fk_corte = corte::latest()->first()['id'];
        if ($data->save()){
            //Asignar las revisiones (faltan algunos parametros)
            //                     ->whereBetween('fecha_adquisiscion', array($request->fk_fecha_adquisiscion_inicio, $request->fk_fecha_adquisiscion_final ))
            foreach (
                articulo::where('fk_departamento', $request->fk_departamento)
                    ->get() as $disp_art){
                $disp_art->disponibilidad = 'en_revision';
                $disp_art->fk_revision = $data->id;
                $disp_art->timestamps = false;
                $disp_art->disponibilidad_updated_at = date("Y-m-d h:i:s");
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
    public function edit(revision $revision)
    {
        //
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
}
