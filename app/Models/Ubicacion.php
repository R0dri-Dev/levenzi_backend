<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Ubicacion extends Model
{
    protected $table = 'ubicaciones';

    protected $fillable = [
        'latitud',
        'longitud',
    ];

    protected $casts = [
        'latitud' => 'decimal:7',
        'longitud' => 'decimal:7',
    ];

    public function ubicable(): MorphTo
    {
        return $this->morphTo();
    }
}
