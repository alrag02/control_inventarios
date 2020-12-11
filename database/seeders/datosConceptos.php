<?php

namespace Database\Seeders;

use App\Models\Inmobiliario\area;
use App\Models\Inmobiliario\departamento;
use App\Models\Inmobiliario\edificio;
use App\Models\Inmobiliario\empleado;
use App\Models\Inmobiliario\encargo;
use App\Models\Inmobiliario\estado;
use App\Models\Inmobiliario\familia;
use App\Models\Inmobiliario\oficina;
use App\Models\Inmobiliario\tipo_compra;
use App\Models\Inmobiliario\tipo_equipo;
use Illuminate\Database\Seeder;

class datosConceptos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        area::create([
            'nombre' => 'Academico',
            'vigencia' => '1'
        ]);

        area::create([
            'nombre' => 'Administrativo',
            'vigencia' => '1'
        ]);

        area::create([
            'nombre' => 'Planeación y Vinculacion ',
            'vigencia' => '1'
        ]);

        departamento::create([
            'nombre' => 'Direccion Academica',
            'fk_area' => '1',
            'vigencia' => '1'
        ]);

        departamento::create([
            'nombre' => 'Desarrollo Academico',
            'fk_area' => '1',
            'vigencia' => '1'
        ]);

        departamento::create([
            'nombre' => 'Mantenimiento y servicios generales',
            'fk_area' => '2',
            'vigencia' => '1'
        ]);

        departamento::create([
            'nombre' => 'Calidad',
            'fk_area' => '3',
            'vigencia' => '1'
        ]);

        edificio::create([
            'nombre' => 'Edificio A',
            'vigencia' => '1'
        ]);

        edificio::create([
            'nombre' => 'Edificio B',
            'vigencia' => '1'
        ]);

        edificio::create([
            'nombre' => 'Edificio C',
            'vigencia' => '1'
        ]);

        edificio::create([
            'nombre' => 'Edificio D',
            'vigencia' => '0'
        ]);

        oficina::create([
            'nombre' => 'Oficina 1',
            'fk_edificio' => '1',
            'planta' => '1',
            'vigencia' => '1'
        ]);
        oficina::create([
            'nombre' => 'Oficina 2',
            'fk_edificio' => '1',
            'planta' => '1',
            'vigencia' => '1'
        ]);
        oficina::create([
            'nombre' => 'Oficina 3',
            'fk_edificio' => '1',
            'planta' => '2',
            'vigencia' => '1'
        ]);
        oficina::create([
            'nombre' => 'Sala de Computo',
            'fk_edificio' => '2',
            'planta' => '2',
            'vigencia' => '1'
        ]);
        oficina::create([
            'nombre' => 'Planta de Mecánica',
            'fk_edificio' => '2',
            'planta' => '1',
            'vigencia' => '1'
        ]);
        oficina::create([
            'nombre' => 'Oficina C10',
            'fk_edificio' => '3',
            'planta' => '1',
            'vigencia' => '1'
        ]);
        oficina::create([
            'nombre' => 'Biblioteca',
            'fk_edificio' => '3',
            'planta' => '2',
            'vigencia' => '1'
        ]);

        empleado::create([
            'nombre' => 'Karla Maria',
            'apellido_paterno' => 'Gonzales',
            'apellido_materno' => 'Garcia',
            'num_ref' => '111111',
            'email' => 'a1b2c3@outlook.com',
            'nivel' => 'Sra.',
            'vigencia' => '1',
            'fk_departamento' => '3'
        ]);
        empleado::create([
            'nombre' => 'Oscar',
            'apellido_paterno' => 'Montelongo',
            'apellido_materno' => 'Torres',
            'num_ref' => '43twgw',
            'email' => 'urugwvbrh48324@outlook.com',
            'nivel' => 'Ing.',
            'vigencia' => '1',
            'fk_departamento' => '2'
        ]);
        empleado::create([
            'nombre' => 'Juana',
            'apellido_paterno' => 'Gonzales',
            'apellido_materno' => 'Garcia',
            'num_ref' => 'ojenqaof3',
            'email' => 'uf93hq@outlook.com',
            'nivel' => 'Sra.',
            'vigencia' => '1',
            'fk_departamento' => '1'
        ]);
        /*
        encargo::create([
            'nombre' => 'Encargado de Area',
            'vigencia' => '1'
        ]);


        encargo::create([
            'nombre' => 'Titular 1',
            'vigencia' => '1'
        ]);

        encargo::create([
            'nombre' => 'Titular 2',
            'vigencia' => '1'
        ]);

        encargo::create([
            'nombre' => 'Resguardante 1',
            'vigencia' => '1'
        ]);

        encargo::create([
            'nombre' => 'Resguardante 2',
            'vigencia' => '1'
        ]);
        */

        tipo_compra::create([
            'nombre' => 'Compra Licitacion',
            'sigla' => 'CI',
            'vigencia' => '1'
        ]);

        tipo_compra::create([
            'nombre' => 'Donacion',
            'sigla' => 'DO',
            'vigencia' => '0'
        ]);

        tipo_equipo::create([
            'nombre' => 'Mobiliario',
            'sigla' => 'MOB',
            'vigencia' => '1'
        ]);

        tipo_equipo::create([
            'nombre' => 'Equipo de Oficinas',
            'sigla' => 'EO',
            'vigencia' => '1'
        ]);

        tipo_equipo::create([
            'nombre' => 'Equipo de Computo',
            'sigla' => 'EC',
            'vigencia' => '1'
        ]);

        estado::create([
            'nombre' => 'Bueno',
            'vigencia' => '1'
        ]);

        estado::create([
            'nombre' => 'Extraviado',
            'vigencia' => '1'
        ]);

        estado::create([
            'nombre' => 'Dañado',
            'vigencia' => '1'
        ]);

        familia::create([
            'nombre' => 'Mobiliario y equipo de Administración',
            'sigla' => '5100',
            'vigencia' => '1'
        ]);

        familia::create([
            'nombre' => 'Mobiliario y equipo Educacional',
            'sigla' => '5200',
            'vigencia' => '1'
        ]);

        familia::create([
            'nombre' => 'Mobiliario y equipo de Laboratorio',
            'sigla' => '5300',
            'vigencia' => '1'
        ]);

        familia::create([
            'nombre' => 'Equipo de Transporte y Vehiculos',
            'sigla' => '5400',
            'vigencia' => '1'
        ]);

        familia::create([
            'nombre' => 'Maquinaria industrial y Herramientas',
            'sigla' => '5600',
            'vigencia' => '1'
        ]);

        familia::create([
            'nombre' => 'Equipo de cómputo y Telecomunicaciones',
            'sigla' => '5150',
            'vigencia' => '1'
        ]);
    }
}
