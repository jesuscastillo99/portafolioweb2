<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trimestre extends Model
{
    protected $primaryKey = 'idtrimestre';
    // Especificar el nombre de la tabla
    protected $table = 'trimestre';
    // Desactivar timestamps
    public $timestamps = false;
    protected $fillable = [
        'tipo',
        'meses',
        'año',
    ];

    use HasFactory;
}
