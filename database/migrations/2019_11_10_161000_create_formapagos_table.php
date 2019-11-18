<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormapagosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formapagos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre', 75);
            $table->string('descripcion',125);
            $table->boolean('condicion')->default(1);
        });
        DB::table('formapagos')->insert([
            'nombre' => 'Efectivo',
            'descripcion' => 'Pago con dinero en efectivo',
          ]);

          DB::table('formapagos')->insert([
            'nombre' => 'Tarjeta de Credito',
            'descripcion' => 'Pago con tarjeta de credito',
          ]);

          DB::table('formapagos')->insert([
            'nombre' => 'Tarjeta de debito',
            'descripcion' => 'Pago con tarjeta de debito',
          ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('formapagos');
    }
}
