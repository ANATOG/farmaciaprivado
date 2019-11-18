<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    protected $table = 'ventas';
    protected $fillable =[
        'idCliente',
        'idUsuario',
        'idFarmacia',
        'numcompra',
        'fecha_venta',
        'total',
        'idTipoPago',
        'estado'
    ];
}
