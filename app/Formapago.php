<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Formapago extends Model
{
    protected $table='formapagos';

    protected $fillable=['nombre, descripcion, condicion'];    
}
