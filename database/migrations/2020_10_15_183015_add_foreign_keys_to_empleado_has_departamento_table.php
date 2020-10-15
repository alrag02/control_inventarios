<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToEmpleadoHasDepartamentoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('empleado_has_departamento', function (Blueprint $table) {
            $table->foreign('fk_departamento', 'empleado_has_departamento_ibfk_1')->references('id')->on('departamento')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('fk_empleado', 'empleado_has_departamento_ibfk_2')->references('id')->on('empleado')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('empleado_has_departamento', function (Blueprint $table) {
            $table->dropForeign('empleado_has_departamento_ibfk_1');
            $table->dropForeign('empleado_has_departamento_ibfk_2');
        });
    }
}
