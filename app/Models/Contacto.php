<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contacto extends Model
{
    public $timestamps = false;
    protected $primaryKey='id_con';
    protected $fillable = [      
     'nombre',
     'telefono',
     'correo',
     'descripcion',
    ];
}
