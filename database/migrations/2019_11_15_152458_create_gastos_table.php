<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGastosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gastos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idTipogasto')->unsigned();
            $table->foreign('idTipogasto')->references('id')->on('tipogastos')->onDelete('cascade');
            $table->integer('idUsuario')->unsigned();
            $table->foreign('idUsuario')->references('id')->on('users');
            $table->integer('idFarmacia')->unsigned();
            $table->foreign('idFarmacia')->references('id')->on('farmacias');
            $table->dateTime('fecha');
            $table->decimal('monto', 11,2);
            $table->integer('nodoc')->nullable();
            $table->string('descripcion',250)->nullable();            
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
        Schema::dropIfExists('gastos');
    }
}
