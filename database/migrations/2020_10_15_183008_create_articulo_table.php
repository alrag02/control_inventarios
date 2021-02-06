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
            $table->string('etiqueta_externa', 128)->nullable();
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
            $table->enum('activo_resguardo', ['no_disponible','activo','resguardo'])->nullable();
            $table->boolean('vigencia')->nullable();
            $table->enum('disponibilidad',['sin_revisar','en_revision','revisado'])->nullable();
            $table->dateTime('disponibilidad_updated_at')->nullable();
            $table->unsignedBigInteger('disponibilidad_updated_by')->nullable()->index('disponibilidad_updated_by');


            $table->integer('empleado_encargado_area')->nullable()->index('empleado_encargado_area');
            $table->integer('empleado_titular')->nullable()->index('empleado_titular');
            $table->integer('empleado_titular_secundario')->nullable()->index('empleado_titular_secundario');
            $table->integer('empleado_resguardo')->nullable()->index('empleado_resguardo');
            $table->integer('empleado_resguardo_secundario')->nullable()->index('empleado_resguardo_secundario');

            $table->integer('fk_familia')->nullable()->index('fk_familia');
            $table->integer('fk_departamento')->nullable()->index('fk_departamento');
            $table->integer('fk_estado')->nullable()->index('fk_estado');
            $table->integer('fk_foto')->nullable()->index('fk_foto');
            $table->integer('fk_oficina')->nullable()->index('fk_oficina');
            $table->integer('fk_tipo_compra')->nullable()->index('fk_tipo_compra');
            $table->integer('fk_tipo_equipo')->nullable()->index('fk_tipo_equipo');
            $table->integer('fk_revision')->nullable()->index('fk_revision');

            $table->timestamps();
            $table->unsignedBigInteger('updated_by')->nullable()->index('updated_by');



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
