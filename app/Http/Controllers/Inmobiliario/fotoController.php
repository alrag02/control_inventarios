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
    public function __construct()
    {
        $this->middleware(['permission:crear conceptos'], ['only' => ['create', 'store']]);
        $this->middleware(['permission:editar conceptos'], ['only' => ['edit', 'update']]);
        $this->middleware(['permission:consultar conceptos'], ['only' => 'index']);
        $this->middleware(['permission:eliminar conceptos'], ['only' => 'destroy']);
    }
    /**
     * Listing Of images gallery
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        return view('inmobiliario.foto.index',['images' =>  foto::all() , 'familia' => familia::all() ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        return view('inmobiliario.foto.edit',["foto" => foto::find($id), "familia" => familia::all()]);
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
        //Obtener el dato

        $data = foto::find($id);

        //Cambiar los datos con los que se obtengan del request en edit

        $data->name = $request->name;
        $data->fk_familia = $request->fk_familia;

        //Actualizar el dato y dirigir al index con mensaje,
        // si no puede actualizar, regresar a edit con mensaje de error

        return $data->save() ? redirect("inmobiliario/foto/")->with('message', 'Modificado Correctamente') : view("inmobiliario.area.edit");
    }

    /**
     * Remove Image function
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Obtener el dato

        $data = foto::find($id);

        //Determinar si el dato contiene otros datos dependientes

        if( count($data->articulo) > 0 ){

            //En caso de ser ser así regresar al index con mensaje de error

            return redirect("inmobiliario/foto")->with('message', 'Tiene '.count($data->departamento).' articulos dependientes, editelos para que no dependan de este campo.');
        }else{

            //Quitar la imagen del storage

            $filename = $data->image;
            if (Storage::disk('img_thumbnail')->delete($filename.'.jpg')){

                //Eliminar el dato y dirigir al index con mensaje,
                // si no puede eliminarlo, regresar a edit con mensaje de error

                return foto::destroy($id) ? redirect("inmobiliario/foto")->with('message', 'Elemento eliminado'): view("inmobiliario.foto.edit")->with('message', 'No se pudo eliminar');
            }else{
                return view("inmobiliario.foto.edit")->with('message', 'No se pudo eliminar');
            }
        }
    }
}
