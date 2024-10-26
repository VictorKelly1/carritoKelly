<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vvino extends Model
{
    //
    // Especifica el nombre de la tabla si es necesario
    protected $table = 'vvinos';

    // Especifica la clave primaria de la tabla
    protected $primaryKey = 'idVino';

    // Si no es autoincremental, establece a false (opcional si aplica)
    public $incrementing = true;

    // Indica si la clave primaria es de tipo integer o string
    protected $keyType = 'int'; // Cambiar a 'string' si es de ese tipo.
}
