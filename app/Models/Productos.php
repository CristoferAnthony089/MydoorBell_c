<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'img_producto',
        'nombre_producto',
        'precio_pro',
        'descripcion',
        'stock',
        'id_categoria',
        'id_subcategoria',
    ];
    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'id_categoria');
    }

    public function subcategoria()
    {
        return $this->belongsTo(Subcategorias::class, 'id_subcategoria');
    }
    use HasFactory;
}
