<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TipoDocumento extends Model
{
    protected $table = 'tipos_documento';

    protected $fillable = [
        'codigo',
        'nombre',
        'longitud',
        'activo',
    ];

    protected $casts = [
        'activo' => 'boolean',
    ];

    public function clientes(): HasMany
    {
        return $this->hasMany(Cliente::class, 'tipo_documento_id');
    }
}
