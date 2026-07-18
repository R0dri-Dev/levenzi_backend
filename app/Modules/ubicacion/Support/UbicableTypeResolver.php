<?php

namespace App\Modules\ubicacion\Support;

use App\Models\Cliente;
use App\Models\Instalacion;
use App\Models\Sede;

class UbicableTypeResolver
{
    public const MAP = [
        'sede' => Sede::class,
        'cliente' => Cliente::class,
        'instalacion' => Instalacion::class,
    ];

    public static function resolve(string $alias): string
    {
        return self::MAP[$alias];
    }
}
