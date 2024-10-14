<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    
    protected $fillable = [
        'idcomentario',
        'idevidencia',
        'fecha',
        'tipocom',
        'comentario',
    ];

    protected $primaryKey = 'idcomentario';
    // Especificar el nombre de la tabla
    protected $table = 'comentario';
    // Desactivar timestamps
    public $timestamps = false;

    use HasFactory;
}
