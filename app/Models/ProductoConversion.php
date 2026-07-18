<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductoConversion extends Model
{
    protected $table = 'producto_conversiones';

    protected $fillable = [
        'producto_id',
        'unidad_medida_origen_id',
        'unidad_medida_destino_id',
        'factor_conversion',
        'activo',
        'created_by',
        'updated_by',
    ];

    protected $casts = [
        'factor_conversion' => 'decimal:10',
        'activo' => 'boolean',
    ];

    public function producto(): BelongsTo
    {
        return $this->belongsTo(Producto::class, 'producto_id');
    }

    public function unidadMedidaOrigen(): BelongsTo
    {
        return $this->belongsTo(UnidadMedida::class, 'unidad_medida_origen_id');
    }

    public function unidadMedidaDestino(): BelongsTo
    {
        return $this->belongsTo(UnidadMedida::class, 'unidad_medida_destino_id');
    }

    public function creadoPor(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function actualizadoPor(): BelongsTo
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
}
