<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Intercambio extends Model
{
    protected $table = 'intercambios';
    protected $fillable = [
        'idDa',
        'idPide',
        'idMedicamento',
        'idUsuario',
        'cantidad',
        'fecha'
    ];
}
