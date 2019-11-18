<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    protected $table='empleados';

    protected $fillable=['dpi, nombre1, nombre2, apellido1, apellido2, direccion, telefono, correo, condicion. idFarmacia'];

    public function users()
    {
        return $this->hasMany('App\User');
    }
}
