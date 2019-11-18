<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Responsabilidad extends Model
{
    protected $table = 'responsabilidades';
    protected $fillable =[
        'idActivo',
        'idEmpleado',
        'idFarmacia',
        'fechaasig',
        'descripcion',
        'condicion'
    ];
    public $timestamps = false;
}
