<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Inmobiliario\articulo;
use Illuminate\Http\Request;

class articuloApiController extends Controller
{

    public function index()
    {
        return articulo::with('estado','departamento','oficina','revision')->get();
    }

    public function index_por_work_id()
    {
        return articulo::with('estado','departamento','oficina','revision')->get();
    }

    /*
    public function store(Request $request)
    {
        $article = articulo::create($request->all());

        return response()->json($article, 201);
    }
    */
    public function show($id)
    {
        return articulo::with('estado','departamento','oficina','revision')->find($id);
    }


    public function edit(articulo $articulo)
    {
        //
    }


    public function update(Request $request, articulo $articulo)
    {
        $articulo->update($request->all());

        return response()->json($articulo, 200);
    }


    /*
    public function destroy(articulo $articulo)
    {
        //
    }
    */
}
