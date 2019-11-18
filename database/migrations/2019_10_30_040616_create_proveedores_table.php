<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProveedoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proveedores', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nit', 20)->unique();
            $table->string('nombre', 70)->unique();
            $table->string('descripcion', 100)->nullable();
            $table->string('direccion', 175)->nullable();
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
        Schema::dropIfExists('proveedores');
    }
}
