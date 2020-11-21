<?php

namespace App\Http\Controllers\inmobiliario;

use App\Http\Controllers\Controller;
use App\Models\Inmobiliario\articulo;
use Illuminate\Http\Request;
use Milon\Barcode\DNS1D;

class barcodeController extends Controller
{
    /*
    public function generateBarCode($id){
        return (new DNS1D)->getBarcodeHTML($id, 'C128', '1','100', 'black', true);
    }*/

    public function generateBarcode(Request $request){
        $id = $request->get('id');
        $product = articulo::find($id);
        return view('inmobiliario.articulo.get_barcode')->with('product',$product);
    }

    public function barcode($id)
    {
        return view('inmobiliario.articulo.get_barcode', [
            'articulo' => articulo::find($id)]
        );
    }
}
