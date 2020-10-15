<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticuloHasDepartamentoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articulo_has_departamento', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('fk_departamento')->nullable()->index('fk_departamento');
            $table->integer('fk_articulo')->nullable()->index('fk_articulo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articulo_has_departamento');
    }
}
