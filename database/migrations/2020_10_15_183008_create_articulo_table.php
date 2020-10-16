<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticuloTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articulo', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('etiqueta_local', 128)->nullable()->unique();
            $table->string('etiqueta_externa', 128)->nullable()->unique();
            $table->string('concepto', 128)->nullable();
            $table->string('marca', 128)->nullable();
            $table->string('modelo', 128)->nullable();
            $table->string('descripcion', 128)->nullable();
            $table->string('numero_serie', 128)->nullable();
            $table->string('color', 128)->nullable();
            $table->integer('cantidad')->nullable();
            $table->string('placas', 128)->nullable();
            $table->string('observaciones', 512)->nullable();
            $table->date('fecha_adquisiscion')->nullable();
            $table->double('costo')->nullable();
            $table->string('num_factura', 128)->nullable();
            $table->enum('activo_resguardo', ['activo', 'resguardo'])->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articulo');
    }
}
