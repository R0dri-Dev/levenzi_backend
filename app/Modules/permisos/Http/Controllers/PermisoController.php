<?php

namespace App\Modules\permisos\Http\Controllers;

use App\Models\Permiso;
use Illuminate\Http\Request;

class PermisoController
{
    public function index(Request $request)
    {
        $query = Permiso::query();

        if ($request->filled('modulo_id')) {
            $query->where('modulo_id', (int) $request->get('modulo_id'));
        }

        if ($request->filled('name')) {
            $query->where('name', 'like', '%' . $request->get('name') . '%');
        }

        return response()->json($query->orderByDesc('id')->paginate((int) $request->get('per_page', 15)));
    }

    public function show(int $id)
    {
        $permiso = Permiso::findOrFail($id);
        return response()->json($permiso);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'modulo_id' => ['required', 'integer', 'min:1'],
            'name' => ['required', 'string', 'max:255'],
            'guard_name' => ['nullable', 'string', 'max:255'],
        ]);

        $permiso = Permiso::create([
            'modulo_id' => $data['modulo_id'],
            'name' => $data['name'],
            'guard_name' => $data['guard_name'] ?? 'web',
        ]);

        return response()->json($permiso, 201);
    }

    public function update(Request $request, int $id)
    {
        $permiso = Permiso::findOrFail($id);

        $data = $request->validate([
            'modulo_id' => ['sometimes', 'integer', 'min:1'],
            'name' => ['sometimes', 'string', 'max:255'],
            'guard_name' => ['nullable', 'string', 'max:255'],
        ]);

        $permiso->update($data);

        return response()->json($permiso);
    }

    public function destroy(int $id)
    {
        $permiso = Permiso::findOrFail($id);
        $permiso->delete();

        return response()->json(['message' => 'Eliminado']);
    }
}

