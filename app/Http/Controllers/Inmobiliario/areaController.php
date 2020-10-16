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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $area = area::all();
        return $area;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $area = area::create($request->all());
        return $area;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Inmobiliario\area  $area
     * @return \Illuminate\Http\Response
     */
    public function show(area $area)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Inmobiliario\area  $area
     * @return \Illuminate\Http\Response
     */
    public function edit(area $area)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Inmobiliario\area  $area
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, area $area)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Inmobiliario\area  $area
     * @return \Illuminate\Http\Response
     */
    public function destroy(area $area)
    {
        //
    }
}
