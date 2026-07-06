<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Distrito extends Model
{
    protected $table = 'distritos';

    protected $fillable = [
        'provincia_id',
        'codigo',
        'nombre',
    ];

    public function provincia(): BelongsTo
    {
        return $this->belongsTo(Provincia::class, 'provincia_id');
    }

    public function clientes(): HasMany
    {
        return $this->hasMany(Cliente::class, 'distrito_id');
    }
}

