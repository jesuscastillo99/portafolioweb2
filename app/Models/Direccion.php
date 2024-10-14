<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Direccion extends Model
{
    protected $primaryKey = 'iddireccion';
    // Especificar el nombre de la tabla
    protected $table = 'direccion';
    // Desactivar timestamps
    public $timestamps = false;
    protected $fillable = [
        'nombredire',
    ];

    use HasFactory;
}
