<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Principio extends Model
{
    protected $table='principios';

    protected $fillable=['nombre, descripcion, condicion'];
}
