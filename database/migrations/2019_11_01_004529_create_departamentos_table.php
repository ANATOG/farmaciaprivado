<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepartamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('departamentos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre', 75);
            $table->boolean('condicion')->default(1);
        }); 

        DB::table('departamentos')->insert([
            'nombre' => 'Huehuetenango',
          ]);

          DB::table('departamentos')->insert([
            'nombre' => 'San Marcos',
          ]);

          DB::table('departamentos')->insert([
            'nombre' => 'Qutzaltenango',
          ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('departamentos');
    }
}
