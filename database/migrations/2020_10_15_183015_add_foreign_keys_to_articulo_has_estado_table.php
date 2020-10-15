<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToArticuloHasEstadoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('articulo_has_estado', function (Blueprint $table) {
            $table->foreign('fk_estado', 'articulo_has_estado_ibfk_1')->references('id')->on('estado')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('fk_articulo', 'articulo_has_estado_ibfk_2')->references('id')->on('articulo')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('articulo_has_estado', function (Blueprint $table) {
            $table->dropForeign('articulo_has_estado_ibfk_1');
            $table->dropForeign('articulo_has_estado_ibfk_2');
        });
    }
}
