<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vtransaccion extends Model
{
    //
    // Especifica el nombre de la tabla si es necesario
    protected $table = 'vtransaccions';

    // Especifica la clave primaria de la tabla
    protected $primaryKey = 'idTransaccion';

    // Si no es autoincremental, establece a false (opcional si aplica)
    public $incrementing = true;

    // Indica si la clave primaria es de tipo integer o string
    protected $keyType = 'int'; // Cambiar a 'string' si es de ese tipo.
}
