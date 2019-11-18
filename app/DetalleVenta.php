<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetalleVenta extends Model
{
    protected $table = 'detalle_ventas';
    protected $fillable = [
        'idVenta',
        'idMedicamento',
        'cantidad',
        'precio'
    ];
    public $timestamps = false;
}
