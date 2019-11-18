<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medicamento extends Model
{
    protected $table='medicamentos';

    protected $fillable=['idMarca, idPresentacion, nombre, 
    precio, descripcion, contenido, condicion'];
}
