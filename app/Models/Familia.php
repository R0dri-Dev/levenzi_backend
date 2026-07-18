<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Familia extends Model
{
    protected $table = 'familias';

    protected $fillable = [
        'familia_padre_id',
        'nombre',
        'descripcion',
        'activo',
        'created_by',
        'updated_by',
    ];

    protected $casts = [
        'activo' => 'boolean',
    ];

    public function padre(): BelongsTo
    {
        return $this->belongsTo(Familia::class, 'familia_padre_id');
    }

    public function subfamilias(): HasMany
    {
        return $this->hasMany(Familia::class, 'familia_padre_id');
    }

    public function creadoPor(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function actualizadoPor(): BelongsTo
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    public function productos(): HasMany
    {
        return $this->hasMany(Producto::class, 'familia_id');
    }
}
