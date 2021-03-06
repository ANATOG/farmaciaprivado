<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gasto extends Model
{
    protected $table = 'gastos';
    protected $fillable = [
        'idTipogasto',
        'idUsuario',
        'idFarmacia',
        'fecha',
        'monto',
        'nodoc',
        'descripcion',
        'condicion'
    ];
}
