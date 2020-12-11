<?php

namespace App\Http\Controllers\Revision;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;

class corteExportController extends Controller implements FromCollection
{
    public function collection()
    {
        return collect(DB::select("
        SELECT
        articulo.etiqueta_externa ,
        articulo.etiqueta_local as 'Etiqueta Tecmm',
        articulo.concepto,
        articulo.descripcion,
        articulo.numero_serie,
        articulo.cantidad,
        articulo.observaciones,
        articulo.fecha_adquisiscion,
        articulo.costo,
        articulo.num_factura,
        articulo.activo_resguardo,
        familia.nombre as 'familia',
        area.nombre as 'area',
        departamento.nombre as 'departamento',
        estado.nombre as 'estado',
        edificio.nombre as 'edificio',
        oficina.nombre as 'oficina',
        oficina.planta as 'planta',
        tipo_compra.nombre as 'tipo_compra',
        tipo_equipo.nombre as 'tipo_equipo',
        articulo.placas,
        articulo.color,
        CONCAT(encargado.nombre,' ',encargado.apellido_paterno,' ',encargado.apellido_materno) AS 'encargado de area',
        CONCAT(titular1.nombre,' ',titular1.apellido_paterno,' ',titular1.apellido_materno) AS 'titular 1' ,
        CONCAT(titular2.nombre,' ',titular2.apellido_paterno,' ',titular2.apellido_materno) AS 'titular 2' ,
        CONCAT(resguardo1.nombre,' ',resguardo1.apellido_paterno,' ',resguardo1.apellido_materno) AS 'resguardo 1',
        CONCAT(resguardo2.nombre,' ',resguardo2.apellido_paterno,' ',resguardo2.apellido_materno) AS 'resguardo 2' ,
        articulo.activo_resguardo,
        articulo.marca,
        articulo.modelo
        FROM articulo
          LEFT JOIN empleado AS encargado ON articulo.empleado_encargado_area = encargado.id
          LEFT JOIN empleado AS titular1 ON articulo.empleado_titular = titular1.id
          LEFT JOIN empleado AS titular2 ON articulo.empleado_titular_secundario = titular2.id
          LEFT JOIN empleado AS resguardo1 ON articulo.empleado_resguardo = resguardo1.id
          LEFT JOIN empleado AS resguardo2 ON articulo.empleado_resguardo_secundario = resguardo2.id,
        familia,
        area,
        departamento,
        estado,
        edificio,
        oficina,
        tipo_compra,
        tipo_equipo,
        empleado
        WHERE familia.id = articulo.fk_familia
        AND area.id = departamento.fk_area
        AND departamento.id = articulo.fk_departamento
        AND estado.id = articulo.fk_estado
        AND edificio.id = oficina.fk_edificio
        AND oficina.id = articulo.fk_oficina
        AND tipo_compra.id = articulo.fk_tipo_compra
        AND tipo_equipo.id = articulo.fk_tipo_equipo
        AND empleado.id = articulo.empleado_titular;
        "));
    }
}
