<?php

namespace App\Http\Controllers\Inmobiliario;

use App\Http\Controllers\Controller;
use App\Models\inmobiliario\foto;
use App\Models\inmobiliario\familia;
use Illuminate\Http\Request;
use Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Input;

class fotoController extends Controller
{
    /**
     * Listing Of images gallery
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
       /* $images = foto::get();
        return view('inmobiliario.foto.image-gallery',compact('images'));
       */
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $images = foto::get();
        return view('inmobiliario.foto.create',['images' =>  foto::get() , 'familia' => familia::all() ]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
             $filename    = pathinfo($request->file('image'), PATHINFO_FILENAME);

            $image = Image::make($request->file('image')->getRealPath())->resize(92, 92)->encode('jpg', 75);
            Storage::disk('img_thumbnail')->put($filename.'.jpg', $image);

            $product= new foto();
            $product->name = $request->name;
            $product->image = "".$filename;
            $product->fk_familia =  $request->fk_familia;
            $product->save();

            return back()->with('message', 'Se ha guardado la imagen');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove Image function
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Storage::delete('/full/');

        foto::find($id)->delete();
        return back()
            ->with('message','Imagen eliminada.');
    }
}
