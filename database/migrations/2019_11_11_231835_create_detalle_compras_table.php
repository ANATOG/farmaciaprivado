<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalleComprasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_compras', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idCompra')->unsigned();
            $table->foreign('idCompra')->references('id')->on('compras');
            $table->integer('idMedicamento')->unsigned();
            $table->foreign('idMedicamento')->references('id')->on('medicamentos');
            $table->integer('cantidad');
            $table->decimal('precio', 11,2);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalle_compras');
    }
}
