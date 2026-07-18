<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Venta extends Model
{
    protected $table = 'ventas';

    protected $fillable = [
        'codigo',
        'instalacion_id',
        'marcas_id',
        'cliente_id',
        'doctor_id',
        'user_id',
        'direccion',
        'referencia',
        'observaciones',
        'created_by',
        'updated_by',
        'active',
        'preventa'
    ];

    protected $casts = [
        'active' => 'boolean',
        'preventa' => 'boolean',
    ];

    public function sede(): BelongsTo
    {
        return $this->belongsTo(Sede::class, 'sede_id');
    }

    public function cliente(): BelongsTo
    {
        return $this->belongsTo(Cliente::class, 'cliente_id');
    }

    public function doctor(): BelongsTo
    {
        return $this->belongsTo(Doctor::class, 'doctor_id');
    }

    public function usuario(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function detalleVentas(): HasMany
    {
        return $this->hasMany(DetalleVenta::class, 'venta_id');
    }
}

