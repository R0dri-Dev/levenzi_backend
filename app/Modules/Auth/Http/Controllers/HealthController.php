<?php

namespace App\Modules\Auth\Http\Controllers;

class HealthController
{
    public function __invoke()
    {
        return response()->json(['ok' => true]);
    }
}

