<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nit', 20)->unique();
            $table->string('nombre1', 70);
            $table->string('nombre2', 70)->nullable();
            $table->string('apellido1', 70);
            $table->string('apellido2', 70)->nullable();
            $table->string('direccion', 255)->nullable();
            $table->string('telefono', 15)->nullable();
            $table->string('correo', 30)->nullable();
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
        Schema::dropIfExists('clientes');
    }
}
