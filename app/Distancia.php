<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Distancia extends Model
{
    protected $table = 'distancias';
    protected $fillable =[
        'idPuntoA',
        'idPuntoB',
        'distancia',
        'condicion'
    ];
}
