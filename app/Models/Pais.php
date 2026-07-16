<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pais extends Model
{
    protected $table = 'paises';

    protected $fillable = [
        'nombre',
        'codigo_iso2',
        'codigo_telefono',
        'longitud_min',
        'longitud_max',
        'activo',
    ];

    protected $casts = [
        'activo' => 'boolean',
    ];

    public function clientes(): HasMany
    {
        return $this->hasMany(Cliente::class, 'pais_id');
    }
}
