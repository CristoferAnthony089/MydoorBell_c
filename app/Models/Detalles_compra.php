<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detalles_compra extends Model
{
    protected $table = 'detalles_compra';
    public $timestamps = false;

    protected $fillable = [
        'pago_total_com',
        'cantidad_car',
        'id_carrito',
        'id_usuario',
        'id_producto',
    ];
}
