<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Categoria;
use App\Models\Subcategorias;

class Productos extends Model
{
    protected $primaryKey = 'id_pro';

    protected $fillable = [
        'id_pro',
        'imagen_pro',
        'nombre_pro',
        'precio_pro',
        'descripcion_pro',
        'stock_pro',
        'id_cat',
        'id_subc'
    ];
    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'id_cat');
    }

    public function subcategoria()
    {
        return $this->belongsTo(Subcategorias::class, 'id_subc');
    }

    public $timestamps = false;

    use HasFactory;
}
