<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Presentacion extends Model
{
    protected $table='presentaciones';
    protected $fillable=['nombre, condicion'];
    
}
