<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpleadoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleado', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('nombre', 128)->nullable();
            $table->string('apellido_paterno', 128)->nullable();
            $table->string('apellido_materno', 128)->nullable();
            $table->string('num_ref', 64)->nullable();
            $table->string('email', 128)->nullable();
            $table->string('nivel', 128)->nullable();
            $table->boolean('vigencia')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empleado');
    }
}
