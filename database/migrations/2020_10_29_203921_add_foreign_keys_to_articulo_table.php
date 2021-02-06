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
            $table->foreign('fk_familia', 'articulo_ibfk_7')->references('id')->on('familia')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('fk_revision', 'articulo_ibfk_8')->references('id')->on('revision')->onUpdate('RESTRICT')->onDelete('RESTRICT');

            $table->foreign('empleado_encargado_area', 'articulo_ibfk_9')->references('id')->on('empleado')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('empleado_titular', 'articulo_ibfk_10')->references('id')->on('empleado')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('empleado_titular_secundario', 'articulo_ibfk_11')->references('id')->on('empleado')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('empleado_resguardo', 'articulo_ibfk_12')->references('id')->on('empleado')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('empleado_resguardo_secundario', 'articulo_ibfk_13')->references('id')->on('empleado')->onUpdate('RESTRICT')->onDelete('RESTRICT');

            //Referencia a los usuarios que actualizaron los campos, al eliminar están configurados para que aparezcan null
            $table->foreign('updated_by', 'articulo_ibfk_14')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('set null');
            $table->foreign('disponibilidad_updated_by', 'articulo_ibfk_15')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('set null');

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
            $table->dropForeign('articulo_ibfk_7');
            $table->dropForeign('articulo_ibfk_8');
            $table->dropForeign('articulo_ibfk_9');
            $table->dropForeign('articulo_ibfk_10');
            $table->dropForeign('articulo_ibfk_11');
            $table->dropForeign('articulo_ibfk_12');
            $table->dropForeign('articulo_ibfk_13');
            $table->dropForeign('articulo_ibfk_14');
            $table->dropForeign('articulo_ibfk_15');
        });
    }
}
