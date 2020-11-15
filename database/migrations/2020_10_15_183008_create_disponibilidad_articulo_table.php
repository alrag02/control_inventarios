<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDisponibilidadArticuloTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('disponibilidad_articulo', function (Blueprint $table) {
            $table->integer('id', true);
            $table->enum('estado',['sin_revisar','en_revision','revisado'])->nullable();
            $table->integer('fk_articulo')->nullable();
            $table->integer('fk_revision')->nullable();
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
        Schema::dropIfExists('disponibilidad_articulo');
    }
}
