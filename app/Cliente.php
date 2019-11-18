<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table='clientes';

    protected $fillable=['nit, nombre1, nombre2, apellido1, apellido2, direccion, telefono, correo, condicion'];
}
