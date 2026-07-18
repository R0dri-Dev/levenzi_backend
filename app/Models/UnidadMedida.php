<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class UnidadMedida extends Model
{
    protected $table = 'unidades_medida';

    protected $fillable = [
        'tipo_unidad_medida_id',
        'nombre',
        'simbolo',
        'factor_base',
        'base',
        'conversion',
        'activo',
        'created_by',
        'updated_by',
    ];

    protected $casts = [
        'factor_base' => 'decimal:10',
        'base' => 'boolean',
        'conversion' => 'boolean',
        'activo' => 'boolean',
    ];

    public function tipoUnidadMedida(): BelongsTo
    {
        return $this->belongsTo(TipoUnidadMedida::class, 'tipo_unidad_medida_id');
    }

    public function creadoPor(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function actualizadoPor(): BelongsTo
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    public function conversionesOrigen(): HasMany
    {
        return $this->hasMany(ProductoConversion::class, 'unidad_medida_origen_id');
    }

    public function conversionesDestino(): HasMany
    {
        return $this->hasMany(ProductoConversion::class, 'unidad_medida_destino_id');
    }
}
