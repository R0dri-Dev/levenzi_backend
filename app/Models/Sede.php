<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Sede extends Model
{
    protected $table = 'sedes';

    protected $fillable = [
        'compania_id',
        'nombre',
        'codigo',
        'direccion',
        'telefono',
        'email',
    ];

    protected $casts = [
        'activo' => 'boolean',
    ];

    public function compania(): BelongsTo
    {
        return $this->belongsTo(Compania::class, 'compania_id');
    }

    public function clientes(): HasMany
    {
        return $this->hasMany(Cliente::class, 'sede_id');
    }

    public function doctores(): HasMany
    {
        return $this->hasMany(Doctor::class, 'sede_id');
    }

    public function instalaciones(): HasMany
    {
        return $this->hasMany(Instalacion::class, 'sede_id');
    }

    public function ventas(): HasMany
    {
        return $this->hasMany(Venta::class, 'sede_id');
    }

    public function marcas(): HasMany
    {
        // Nota: tu migración de MARCAS no tiene sede_id.
        // Si después lo agregas, cambia la relación aquí.
        return $this->hasMany(Marca::class, 'sede_id');
    }

    public function usuarios(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'sede_usuarios')
            ->withPivot(['es_admin_sede', 'activo'])
            ->withTimestamps();
    }
}

