<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MovimientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movimientosTable', function (Blueprint $table) {
            $table->id('mov_id');
            $table->string('mov_nombre');
            $table->string('mov_valor');
            $table->date('mov_fecha');
            $table->foreignId('cat_id')->references('cat_id')->on('CategoryTable');
            $table->foreignId('usu_id')->references('usu_id')->on('users');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::dropIfExists('movimientosTable');
    }
}
