<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Elemento extends Model
{
    protected $primaryKey = 'idelemento';
    // Especificar el nombre de la tabla
    protected $table = 'elemento';
    // Desactivar timestamps
    public $timestamps = false;
    protected $fillable = [
        'numelemento',
    ];

    use HasFactory;
}
