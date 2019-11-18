<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFarmaciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('farmacias', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre', 170);
            $table->string('telefono', 20)->nullable();
            $table->string('email', 70)->nullable();
            $table->boolean('condicion')->default(1);
            $table->string('direccion', 200)->unsigned();
            $table->string('latitud', 200)->unsigned();
            $table->string('longitud', 200)->unsigned();
            $table->integer('idDepartamento')->unsigned();
            $table->foreign('idDepartamento')->references('id')->on('departamentos');
            $table->integer('idTipo')->unsigned();
            $table->foreign('idTipo')->references('id')->on('tipos');
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
        Schema::dropIfExists('farmacias');
    }
}
