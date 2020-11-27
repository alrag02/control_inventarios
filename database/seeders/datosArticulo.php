<?php

namespace Database\Seeders;

use App\Models\Inmobiliario\articulo;
use Illuminate\Database\Seeder;

class datosArticulo extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Articulo::create( [
            'id'=>1,
            'etiqueta_local'=>'ITSLM-19-CI-EO-2428',
            'etiqueta_externa'=>'tecmm-yyyy-yyyyy',
            'concepto'=>'Silla de Plastico Negra',
            'marca'=>'ALICA',
            'modelo'=>'Merida',
            'descripcion'=>NULL,
            'numero_serie'=>'307041',
            'color'=>'negro',
            'cantidad'=>10,
            'placas'=>NULL,
            'observaciones'=>NULL,
            'fecha_adquisiscion'=>'2019-10-15',
            'costo'=>149,
            'num_factura'=>'149efcw3',
            'activo_resguardo'=>'activo',
            'vigencia'=>1,
            'disponibilidad'=>'sin_revisar',
            'disponibilidad_updated_at'=>NULL,
            'fk_familia'=>1,
            'fk_departamento'=>2,
            'fk_estado'=>1,
            'fk_foto'=>NULL,
            'fk_oficina'=>6,
            'fk_tipo_compra'=>1,
            'fk_tipo_equipo'=>2,
            'fk_revision'=>NULL,
        ] );

        Articulo::create( [
            'id'=>2,
            'etiqueta_local'=>'ITSLM-19-CI-EO-6220',
            'etiqueta_externa'=>NULL,
            'concepto'=>'Computadoras HP Compaq',
            'marca'=>'HP',
            'modelo'=>'JSU3-53',
            'descripcion'=>NULL,
            'numero_serie'=>'49592',
            'color'=>'negro',
            'cantidad'=>10,
            'placas'=>NULL,
            'observaciones'=>NULL,
            'fecha_adquisiscion'=>'2019-12-24',
            'costo'=>NULL,
            'num_factura'=>'149efcw3',
            'activo_resguardo'=>'resguardo',
            'vigencia'=>1,
            'disponibilidad'=>'sin_revisar',
            'disponibilidad_updated_at'=>NULL,
            'fk_familia'=>2,
            'fk_departamento'=>3,
            'fk_estado'=>1,
            'fk_foto'=>NULL,
            'fk_oficina'=>2,
            'fk_tipo_compra'=>1,
            'fk_tipo_equipo'=>2,
            'fk_revision'=>NULL,
        ] );

        Articulo::create( [
            'id'=>3,
            'etiqueta_local'=>'ITSLM-09-CI-EC-35',
            'etiqueta_externa'=>'tecmm-yyyy-XXXXX',
            'concepto'=>'Carro Nissan Tiida',
            'marca'=>'Nissan',
            'modelo'=>'Tiida',
            'descripcion'=>'Carro plateado de 4 puertas',
            'numero_serie'=>'88888',
            'color'=>'blanco',
            'cantidad'=>1,
            'placas'=>'hjcp8y8',
            'observaciones'=>'abc',
            'fecha_adquisiscion'=>'2009-02-15',
            'costo'=>392981,
            'num_factura'=>'149efcw3',
            'activo_resguardo'=>'resguardo',
            'vigencia'=>1,
            'disponibilidad'=>'sin_revisar',
            'disponibilidad_updated_at'=>NULL,
            'fk_familia'=>3,
            'fk_departamento'=>1,
            'fk_estado'=>1,
            'fk_foto'=>NULL,
            'fk_oficina'=>4,
            'fk_tipo_compra'=>1,
            'fk_tipo_equipo'=>3,
            'fk_revision'=>NULL,
        ] );

        Articulo::create( [
            'id'=>4,
            'etiqueta_local'=>'ITSLM-20-CI-EO-347',
            'etiqueta_externa'=>'tecmm-WWWWWW-yyyyy',
            'concepto'=>'Silla de Oficina',
            'marca'=>'Silla',
            'modelo'=>'Negra',
            'descripcion'=>NULL,
            'numero_serie'=>'307041',
            'color'=>'verde',
            'cantidad'=>17,
            'placas'=>NULL,
            'observaciones'=>NULL,
            'fecha_adquisiscion'=>'2020-10-10',
            'costo'=>201,
            'num_factura'=>'149efcw3',
            'activo_resguardo'=>'resguardo',
            'vigencia'=>1,
            'disponibilidad'=>'sin_revisar',
            'disponibilidad_updated_at'=>NULL,
            'fk_familia'=>5,
            'fk_departamento'=>1,
            'fk_estado'=>1,
            'fk_foto'=>NULL,
            'fk_oficina'=>6,
            'fk_tipo_compra'=>1,
            'fk_tipo_equipo'=>2,
            'fk_revision'=>NULL,
        ] );
    }
}
