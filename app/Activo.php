<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activo extends Model
{
    protected $table='activos';

    protected $fillable=['nombre, modelo, nombre2, marca, serie, precio, condicion'];
}
