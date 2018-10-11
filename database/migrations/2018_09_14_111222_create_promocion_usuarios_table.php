<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePromocionUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promocion_usuarios', function (Blueprint $table) {
          $table->increments('id');
          $table->unsignedInteger('id_promocion');
          $table->unsignedInteger('id_usuario');
          $table->foreign('id_promocion')->references('id')->on('promociones');
          $table->foreign('id_usuario')->references('id')->on('users');
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
        Schema::dropIfExists('promocion_usuarios');
    }
}
