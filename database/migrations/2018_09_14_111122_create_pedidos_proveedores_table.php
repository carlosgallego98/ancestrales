<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePedidosProveedoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos_proveedores', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_material')->nullable();
            $table->unsignedInteger('id_estado');
            $table->foreign('id_material')->references('id')->on('materias_primas');
            $table->foreign('id_estado')->references('id')->on('estado_pedidos');
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
        Schema::dropIfExists('pedidos_proveedores');
    }
}
