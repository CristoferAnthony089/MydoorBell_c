<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategorias extends Model
{
    public $timestamps = false;

    protected $primaryKey = 'id_subc';

    protected $fillable = [
        'id_subc',
        'nombre_subc'
    ];
}
