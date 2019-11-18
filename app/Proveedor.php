<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    protected $table='proveedores';

    protected $fillable=['nit, nombre, direccion, telefono, correo, condicion'];
}
