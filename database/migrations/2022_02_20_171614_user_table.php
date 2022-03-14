<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('users', function (Blueprint $table) {
            $table->id('usu_id');
            $table->string('usu_usuario');
            $table->string('password');
            $table->integer('usu_estado')->default(1);
            $table->string('usu_cedula')->unique();
            $table->string('usu_apellido');
            $table->string('usu_nombre');
            $table->string('usu_correo')->unique();
            $table->integer('usu_rol')->default(1);
            $table->integer('usu_tipo')->default(1);
            $table->timestamps();
            $table->rememberToken();

           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
