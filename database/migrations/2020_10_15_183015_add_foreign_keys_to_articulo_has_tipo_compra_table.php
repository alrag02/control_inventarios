<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToArticuloHasTipoCompraTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('articulo_has_tipo_compra', function (Blueprint $table) {
            $table->foreign('fk_tipo_compra', 'articulo_has_tipo_compra_ibfk_1')->references('id')->on('tipo_compra')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('fk_articulo', 'articulo_has_tipo_compra_ibfk_2')->references('id')->on('articulo')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('articulo_has_tipo_compra', function (Blueprint $table) {
            $table->dropForeign('articulo_has_tipo_compra_ibfk_1');
            $table->dropForeign('articulo_has_tipo_compra_ibfk_2');
        });
    }
}
