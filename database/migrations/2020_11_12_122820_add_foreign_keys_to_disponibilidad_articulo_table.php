<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToDisponibilidadArticuloTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('disponibilidad_articulo', function (Blueprint $table) {
            $table->foreign('fk_articulo', 'disponibilidad_articulo_ibfk_1')->references('id')->on('articulo')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('fk_revision', 'disponibilidad_articulo_ibfk_2')->references('id')->on('revision')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::table('disponibilidad_articulo', function (Blueprint $table) {
            $table->dropForeign('disponibilidad_articulo_ibfk_1');
            $table->dropForeign('disponibilidad_articulo_ibfk_2');
        });
    }
}
