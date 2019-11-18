<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePresentacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('presentaciones', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre', 75);
            $table->boolean('condicion')->default(1);
        });

        DB::table('presentaciones')->insert([
            'nombre' => 'Suspension',
          ]);

          DB::table('presentaciones')->insert([
            'nombre' => 'Polvo',
          ]);

          DB::table('presentaciones')->insert([
            'nombre' => 'Capsulas',
          ]);

          DB::table('presentaciones')->insert([
            'nombre' => 'Ampolla',
          ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('presentaciones');
    }
}
