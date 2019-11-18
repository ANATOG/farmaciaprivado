<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Total extends Model
{
    protected $table = 'totales';
    protected $fillable =[
        'nombre',
        'numero',
        'total',
        'fecha'
    ];
    public $timestamps = false;
}
