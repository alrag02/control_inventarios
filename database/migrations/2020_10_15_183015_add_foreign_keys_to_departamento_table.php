<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToDepartamentoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('departamento', function (Blueprint $table) {
            $table->foreign('fk_area', 'departamento_ibfk_1')->references('id')->on('area')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('departamento', function (Blueprint $table) {
            $table->dropForeign('departamento_ibfk_1');
        });
    }
}
