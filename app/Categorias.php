<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categorias extends Model
{
    protected $fillable = [
        'slug', 'title', 'description', 'nombre', 'descripcion', 'urlfoto', 'visitas', 'orden', 'portada',
    ];

    public function subcategorias()
    {
        return $this->hasMany(Subcategorias::class);
    }
}
