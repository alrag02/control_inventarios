<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToArticuloTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('articulo', function (Blueprint $table) {
            $table->foreign('fk_departamento', 'articulo_ibfk_1')->references('id')->on('departamento')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('fk_estado', 'articulo_ibfk_2')->references('id')->on('estado')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('fk_foto', 'articulo_ibfk_3')->references('id')->on('foto')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('fk_oficina', 'articulo_ibfk_4')->references('id')->on('oficina')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('fk_tipo_compra', 'articulo_ibfk_5')->references('id')->on('tipo_compra')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('fk_tipo_equipo', 'articulo_ibfk_6')->references('id')->on('tipo_equipo')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('articulo', function (Blueprint $table) {
            $table->dropForeign('articulo_ibfk_1');
            $table->dropForeign('articulo_ibfk_2');
            $table->dropForeign('articulo_ibfk_3');
            $table->dropForeign('articulo_ibfk_4');
            $table->dropForeign('articulo_ibfk_5');
            $table->dropForeign('articulo_ibfk_6');
        });
    }
}
