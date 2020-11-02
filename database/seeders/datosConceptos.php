<?php

namespace Database\Seeders;

use App\Models\Inmobiliario\area;
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
            'nombre' => 'Extracurricular',
            'vigencia' => '1'
        ]);




    }
}
