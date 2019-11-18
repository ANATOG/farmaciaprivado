<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicamentos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre', 170);
            $table->decimal('precio',11,2);
            $table->string('contenido');
            $table->string('descripcion', 70)->nullable();
            $table->boolean('condicion')->default(1);
            $table->integer('idPresentacion')->unsigned();
            $table->foreign('idPresentacion')->references('id')->on('presentaciones');
            $table->integer('idMarca')->unsigned();
            $table->foreign('idMarca')->references('id')->on('marcas');
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
        Schema::dropIfExists('medicamentos');
    }
}
