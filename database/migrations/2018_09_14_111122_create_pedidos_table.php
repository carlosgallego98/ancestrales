<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigo',6);
            $table->unsignedInteger('cantidad');
            $table->unsignedInteger('id_usuario');
            $table->unsignedInteger('id_estado');
            $table->unsignedInteger('id_producto');
            $table->foreign('id_usuario')->references('id')->on('users');
            $table->foreign('id_estado')->references('id')->on('estado_pedidos');
            $table->foreign('id_producto')->references('id')->on('productos');
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
        Schema::dropIfExists('pedidos');
    }
}
