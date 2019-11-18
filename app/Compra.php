<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    protected $table='compras';
    
    protected $fillable=[
        'idProveedor',
        'idUsuario',
        'idFarmacia',
        'numcompra',
        'fechacom',
        'total',
        'estado'   
    ];

    public function usuario(){
        return $this->belongsTo('App\User');
    }

    public function proveedor(){
        return $this->belongsTo('App\Proveedor');
    }

    public function farmacia(){
        return $this->belongsTo('App\Farmacia');
    }
}
