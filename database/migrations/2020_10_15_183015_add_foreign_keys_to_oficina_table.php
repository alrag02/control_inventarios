<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToOficinaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('oficina', function (Blueprint $table) {
            $table->foreign('fk_edificio', 'oficina_ibfk_1')->references('id')->on('edificio')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('oficina', function (Blueprint $table) {
            $table->dropForeign('oficina_ibfk_1');
        });
    }
}
