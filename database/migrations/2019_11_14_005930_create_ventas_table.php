<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ventas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idCliente')->unsigned();
            $table->foreign('idCliente')->references('id')->on('clientes');
            $table->integer('idUsuario')->unsigned();
            $table->foreign('idUsuario')->references('id')->on('users');
            $table->integer('idFarmacia')->unsigned();
            $table->foreign('idFarmacia')->references('id')->on('farmacias');
            $table->integer('idTipoPago')->unsigned();
            $table->foreign('idTipoPago')->references('id')->on('formapagos');
            $table->string('numventa',15)->nullable();
            $table->dateTime('fecha_venta');
            $table->decimal('total', 11,2);
            $table->string('estado',20);
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
        Schema::dropIfExists('ventas');
    }
}
