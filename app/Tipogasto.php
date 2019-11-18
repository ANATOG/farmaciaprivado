<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipogasto extends Model
{
    protected $table='tipogastos';

    protected $fillable=['nombre, descripcion, condicion'];
}
