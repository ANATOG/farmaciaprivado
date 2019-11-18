<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre',30)->unique();
            $table->string('descripcion',100)->nullable();
            $table->boolean('condicion')->default(1);
            //$table->timestamps();
        });

        DB::table('roles')->insert([
            'nombre' => 'administrador',
            'descripcion' => 'rol para el adminstrador',
          ]);

          DB::table('roles')->insert([
            'nombre' => 'operador',
            'descripcion' => 'rol para los vendedores',
          ]);

          DB::table('roles')->insert([
            'nombre' => 'callcenter',
            'descripcion' => 'rol para los callcenter',
          ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles');
    }
}
