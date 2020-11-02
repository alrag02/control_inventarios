<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToArticuloHasEmpleadoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('articulo_has_empleado', function (Blueprint $table) {
            $table->foreign('fk_empleado', 'articulo_has_empleado_ibfk_1')->references('id')->on('empleado')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('fk_articulo', 'articulo_has_empleado_ibfk_2')->references('id')->on('articulo')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('fk_encargo', 'articulo_has_empleado_ibfk_3')->references('id')->on('encargo')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('articulo_has_empleado', function (Blueprint $table) {
            $table->dropForeign('articulo_has_empleado_ibfk_1');
            $table->dropForeign('articulo_has_empleado_ibfk_2');
            $table->dropForeign('articulo_has_empleado_ibfk_3');

        });
    }
}
