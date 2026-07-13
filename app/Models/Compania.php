<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Compania extends Model
{
    protected $table = 'companias';

    protected $fillable = [
        'nombre',
        'ruc',
        'direccion',
    ];

    protected $casts = [];

    public function sedes(): HasMany
    {
        return $this->hasMany(Sede::class, 'compania_id');
    }
}

