<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpleadoHasDepartamentoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleado_has_departamento', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('fk_departamento')->nullable()->index('fk_departamento');
            $table->integer('fk_empleado')->nullable()->index('fk_empleado');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empleado_has_departamento');
    }
}
