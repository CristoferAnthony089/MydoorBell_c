<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carritos extends Model
{
    protected $fillable = [
        'cantidad_car',
        'precio_pro',
        'subtotal_car',
        'total_car',
        'id_usu',
        'id_pro'
    ];

    // Indica explícitamente que no hay clave primaria
    protected $primaryKey = null;

    public $timestamps = false;

    use HasFactory;
}
