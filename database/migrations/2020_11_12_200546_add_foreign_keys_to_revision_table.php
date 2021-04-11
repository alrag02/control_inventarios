<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToRevisionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('revision', function (Blueprint $table) {
            $table->foreign('fk_corte', 'revision_ibfk_1')->references('id')->on('corte')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('fk_user', 'revision_ibfk_2')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('fk_oficina', 'revision_ibfk_3')->references('id')->on('oficina')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('revision', function (Blueprint $table) {
            $table->dropForeign('revision_ibfk_1');
            $table->dropForeign('revision_ibfk_2');
            $table->dropForeign('revision_ibfk_3');

        });
    }
}
