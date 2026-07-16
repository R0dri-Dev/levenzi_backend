<?php

namespace App\Core\Rules;

use App\Models\Pais;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class TelefonoValidoParaPais implements ValidationRule
{
    public function __construct(private readonly ?int $paisId) {}

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (! $value) {
            return;
        }

        $digits = preg_replace('/\D/', '', (string) $value);
        $pais = $this->paisId ? Pais::find($this->paisId) : null;

        if (! $pais) {
            if (strlen($digits) < 6 || strlen($digits) > 15) {
                $fail('El teléfono no tiene un formato válido.');
            }

            return;
        }

        if (strlen($digits) < $pais->longitud_min || strlen($digits) > $pais->longitud_max) {
            $rango = $pais->longitud_min === $pais->longitud_max
                ? "{$pais->longitud_min} dígitos"
                : "entre {$pais->longitud_min} y {$pais->longitud_max} dígitos";

            $fail("El teléfono debe tener {$rango} para {$pais->nombre}.");
        }
    }
}
