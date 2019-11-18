<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    protected $table='marcas';

    protected $fillable=['nombre, descripcion, condicion'];// se asume el id por eso no se colocacion ni los campos de auditoria
}
