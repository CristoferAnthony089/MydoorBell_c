<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contacto extends Model
{
    public $timestamps = false;
    protected $table ='contactanos';
    protected $primaryKey='id_con';
    protected $fillable = [      
     'correo_con',
     'tipoasunto_con',
     'descripcion_con',
    ];
}
