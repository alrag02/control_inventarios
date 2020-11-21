<?php

namespace App\Http\Controllers\inmobiliario;

use App\Http\Controllers\Controller;
use App\Models\inmobiliario\foto;
use Illuminate\Http\Request;

class fotoController extends Controller
{
    /**
     * Listing Of images gallery
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $images = foto::get();
        return view('inmobiliario.foto.image-gallery',compact('images'));
    }


    /**
     * store image function
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'descripcion' => 'required',
            'url' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);


        $input['url'] = time().'.'.$request->url->getClientOriginalExtension();
        $request->url->move(public_path('images'), $input['url']);


        $input['descripcion'] = $request->descripcion;
        foto::create($input);


        return back()
            ->with('success','Image storeed successfully.');
    }


    /**
     * Remove Image function
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        foto::find($id)->delete();
        return back()
            ->with('success','Image removed successfully.');
    }
}
