<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Instalacion extends Model
{
    protected $table = 'instalaciones';

    protected $fillable = [
        'sede_id',
        'nombre',
        'tipo',
        'activo',
    ];

    public function sede(): BelongsTo
    {
        return $this->belongsTo(Sede::class, 'sede_id');
    }

    public function productos(): HasMany
    {
        return $this->hasMany(Producto::class, 'instalacion_id');
    }
}

