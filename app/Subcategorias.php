<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcategorias extends Model
{
    protected $fillable = [
        'slug', 'title', 'description', 'nombre', 'descripcion', 'urlfoto', 'visitas', 'orden', 'categoria_id'
    ];

    public function categorias()
    {
        return $this->belongsTo(Categorias::class);
    }
}
