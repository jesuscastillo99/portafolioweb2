<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evidencia extends Model
{
    
    protected $fillable = [
        'iddireccion',
        'idelemento',
        'idtrimestre',
        'fechasubida',
        'año',
        'comenadmin',
        'comenusuario',
        'estadoap',
        'archivoe',
    ];

    protected $primaryKey = 'idevidencia';
    // Especificar el nombre de la tabla
    protected $table = 'evidencia';
    // Desactivar timestamps
    public $timestamps = false;

     // Relación con el modelo Comentario
     public function comentario()
     {
         return $this->hasOne(Comentario::class, 'idcomentario', 'comenadmin');
     }

     public function comentario2()
     {
         return $this->hasOne(Comentario::class, 'idcomentario', 'comenusuario');
     }

     use HasFactory;
    
}
