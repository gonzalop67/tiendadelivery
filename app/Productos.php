<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
    protected $fillable = [
        'slug', 'title', 'description', 'nombre', 'descripcion', 'precio', 'unidad', 'stock', 'urlfoto', 'visitas', 'orden', 'estado', 'subcategoria_id'
    ];

    public function subcategorias()
    {
        return $this->belongsTo(Subcategorias::class);
    }
}
