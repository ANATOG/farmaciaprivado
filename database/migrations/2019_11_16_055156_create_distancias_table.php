<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDistanciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('distancias', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idPuntoA')->unsigned();
            $table->foreign('idPuntoA')->references('id')->on('farmacias');
            $table->integer('idPuntoB')->unsigned();
            $table->foreign('idPuntoB')->references('id')->on('farmacias');
            $table->boolean('condicion')->default(1);
            $table->decimal('distancia', 11,5);
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
        Schema::dropIfExists('distancias');
    }
}
