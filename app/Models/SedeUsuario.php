<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SedeUsuario extends Model
{
    protected $table = 'sede_usuarios';

    protected $fillable = [
        'sede_id',
        'user_id',
        'es_admin_sede',
        'activo',
    ];

    protected $casts = [
        'es_admin_sede' => 'boolean',
        'activo' => 'boolean',
    ];

    public function sede(): BelongsTo
    {
        return $this->belongsTo(Sede::class, 'sede_id');
    }

    public function usuario(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

