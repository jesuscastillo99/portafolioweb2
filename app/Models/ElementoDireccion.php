<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ElementoDireccion extends Model
{
    use HasFactory;
    protected $primaryKey = 'idelemento';

    protected $table = 'elemento_direccion';

    public $timestamps = false;
    
    protected $fillable = [
        'idelemento',
        'iddireccion',
    ];
}
