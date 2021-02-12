<?php

namespace App\Http\Controllers\inmobiliario;

use App\Http\Controllers\Controller;
use App\Models\Inmobiliario\articulo;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use Milon\Barcode\DNS1D;

class barcodeController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:crear etiquetas'], ['only' => 'printBarCode']);

    }

    /*
     public function generateBarCode($id){
         return (new DNS1D)->getBarcodeHTML($id, 'C128', '1','100', 'black', true);
     }
     */

    public function printBarCode($id){

        $data = articulo::find($id);

        $view_html ='<table style="margin-bottom: 30px;" >'.
                    '<tr><td style="text-align: center">'.$data->concepto.'</td></tr>'.
                    '<tr><td>'.(new DNS1D)->getBarcodeHTML($data->etiqueta_local, 'C128','1','60').'</td></tr>'.
                    '<tr><td style="text-align: center">'.$data->etiqueta_local.'</td></tr>'.
                    '<tr><td style="text-align: center">'.$data->departamento->nombre.'</td></tr>'.
                    '</table>';

        $view_png = '<table style="margin-bottom: 30px;" >'.
                    '<tr><td style="text-align: center">'.$data->concepto.'</td></tr>'.
                    '<tr><td><img src="data:image/png;base64,'.(new DNS1D)->getBarcodePNG($data->etiqueta_local, 'C128','1','60',array(1,1,1)).'" alt="barcode" /></td></tr>'.
                    '<tr><td style="text-align: center">'.$data->etiqueta_local.'</td></tr>'.
                    '<tr><td style="text-align: center">'.$data->departamento->nombre.'</td></tr>'.
                    '</table>';

        $pdf = app('dompdf.wrapper');
        $pdf->loadHTML($view_html.$view_html.$view_html.$view_png.$view_png.$view_png, 'UTF-8');
        return $pdf->stream();
    }
}
