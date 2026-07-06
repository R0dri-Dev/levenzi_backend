<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Modulo extends Model
{
    protected $table = 'modulos';

    protected $fillable = [
        'nombre',
        'codigo',
        'descripcion',
    ];

    public function permisos(): HasMany
    {
        return $this->hasMany(Permiso::class, 'modulo_id');
    }
}

