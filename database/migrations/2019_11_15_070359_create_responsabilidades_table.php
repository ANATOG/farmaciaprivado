<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResponsabilidadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('responsabilidades', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idActivo')->unsigned();
            $table->foreign('idActivo')->references('id')->on('activos')->onDelete('cascade');
            $table->integer('idEmpleado')->unsigned();
            $table->foreign('idEmpleado')->references('id')->on('empleados');
            $table->integer('idFarmacia')->unsigned();
            $table->foreign('idFarmacia')->references('id')->on('farmacias');
            $table->dateTime('fechaasig');
            $table->string('descripcion',100)->nullable();
            $table->boolean('condicion')->default(1);
            //$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('responsabilidades');
    }
}
