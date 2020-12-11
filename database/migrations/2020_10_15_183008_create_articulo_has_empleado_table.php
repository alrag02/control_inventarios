<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticuloHasEmpleadoTable extends Migration
{
    /*
     *
     * Run the migrations.
     *
     * @return void

    public function up()
    {
        Schema::create('articulo_has_empleado', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('fk_empleado')->nullable()->index('fk_empleado');
            $table->integer('fk_articulo')->nullable()->index('fk_articulo');
            $table->integer('fk_encargo')->nullable()->index('fk_encargo');
        });
    }

    *
     * Reverse the migrations.
     *
     * @return void

    public function down()
    {
        Schema::dropIfExists('articulo_has_empleado');
    }
     */
}
