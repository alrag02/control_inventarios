<?php

namespace App\Http\Controllers\Revision;

use App\Http\Controllers\Controller;
use App\Models\Inmobiliario\articulo;
use App\Models\Revision\revision;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;

class revisionExportController extends Controller implements FromCollection
{
    protected $id;
    public function __construct($id)
    {
        $this->id = $id;
    }

    public function collection()
    {

        $datos = DB::select("
        SELECT
        articulo.concepto,
        articulo.etiqueta_externa ,
        articulo.numero_serie,
        articulo.marca,
        articulo.modelo,
        articulo.fecha_adquisiscion,
        articulo.num_factura,
        articulo.costo,
        estado.nombre as 'estado',
        edificio.nombre as 'edificio',
        oficina.planta as 'planta',
        oficina.nombre as 'oficina',
        articulo.activo_resguardo,
        articulo.observaciones

        FROM articulo,
        estado,
        edificio,
        oficina

        WHERE estado.id = articulo.fk_estado
        AND edificio.id = oficina.fk_edificio
        AND oficina.id = articulo.fk_oficina
        AND articulo.fk_revision = ".$this->id.";
        ");
        return collect($datos);
    }
}
