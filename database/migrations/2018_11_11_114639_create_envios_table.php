<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnviosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('envios', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_pedido');
            $table->unsignedInteger('id_empresa_transporte');
            $table->unsignedInteger('no_guia');
            $table->foreign('id_pedido')->references('id')->on('pedidos');
            $table->foreign('id_empresa_transporte')->references('id')->on('empresas_transporte');
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
        Schema::dropIfExists('envios');
    }
}
