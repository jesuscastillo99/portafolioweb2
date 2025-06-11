<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsuarioPantallas extends Model
{
    protected $primaryKey = 'IdUsuario';
    // Especificar el nombre de la tabla
    protected $table = 'UsuarioPantallas';
    // Desactivar timestamps
    public $timestamps = false;
    protected $fillable = [
        'IdPantalla'
    ];
    use HasFactory;
}
