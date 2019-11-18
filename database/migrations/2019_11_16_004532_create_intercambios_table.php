<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIntercambiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('intercambios', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idDa')->unsigned();
            $table->foreign('idDa')->references('id')->on('farmacias');
            $table->integer('idPide')->unsigned();
            $table->foreign('idPide')->references('id')->on('farmacias');
            $table->integer('idMedicamento')->unsigned();
            $table->foreign('idMedicamento')->references('id')->on('medicamentos');
            $table->integer('idUsuario')->unsigned();
            $table->foreign('idUsuario')->references('id')->on('users');
            $table->integer('cantidad');
            $table->dateTime('fecha');
            $table->boolean('condicion')->default(1);
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
        Schema::dropIfExists('intercambios');
    }
}
