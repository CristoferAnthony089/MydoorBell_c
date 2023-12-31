<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $fillable = [
        'id_cat',
        'nombre_cat'
    ];

    protected $primaryKey = 'id_cat';

    public $timestamps = false;

    use HasFactory;
}