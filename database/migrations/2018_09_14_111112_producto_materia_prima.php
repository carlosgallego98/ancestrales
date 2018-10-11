<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProductoMateriaPrima extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('producto_materia_prima', function (Blueprint $table) {
      $table->increments('id');
      $table->unsignedInteger('producto_id');
      $table->unsignedInteger('materia_prima_id');
      $table->foreign('producto_id')->references('id')->on('productos');
      $table->foreign('materia_prima_id')->references('id')->on('materias_primas');
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
        Schema::drop('producto_materia_prima');
    }
}
