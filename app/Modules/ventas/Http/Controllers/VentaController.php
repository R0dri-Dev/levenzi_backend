<?php

namespace App\Modules\ventas\Http\Controllers;

use App\Models\Venta;
use Illuminate\Http\Request;

class VentaController
{
    public function index(Request $request)
    {
        $query = Venta::query();

        if ($request->filled('sede_id')) {
            $query->where('sede_id', (int) $request->get('sede_id'));
        }

        if ($request->filled('cliente_id')) {
            $query->where('cliente_id', (int) $request->get('cliente_id'));
        }

        if ($request->filled('doctor_id')) {
            $query->where('doctor_id', (int) $request->get('doctor_id'));
        }

        if ($request->filled('user_id')) {
            $query->where('user_id', (int) $request->get('user_id'));
        }

        return response()->json(
            $query->orderByDesc('id')->paginate((int) $request->get('per_page', 15))
        );
    }

    public function show(int $id)
    {
        $venta = Venta::with(['detalleVentas'])->findOrFail($id);
        return response()->json($venta);
    }
}

