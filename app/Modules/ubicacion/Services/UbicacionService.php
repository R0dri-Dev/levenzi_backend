<?php

namespace Modules\Ubicacion\Services;

use App\Models\Departamento;
use App\Models\Distrito;
use App\Models\Provincia;
use App\Models\Ubicacion;
use Illuminate\Database\Eloquent\Collection;

class UbicacionService
{
    public function listarDepartamentos(): Collection
    {
        return Departamento::orderBy('nombre')->get(['id', 'codigo', 'nombre']);
    }

    public function listarProvinciasPorDepartamento(int $departamentoId): Collection
    {
        return Provincia::where('departamento_id', $departamentoId)
            ->orderBy('nombre')
            ->get(['id', 'codigo', 'nombre', 'departamento_id']);
    }

    public function listarDistritosPorProvincia(int $provinciaId): Collection
    {
        return Distrito::where('provincia_id', $provinciaId)
            ->orderBy('nombre')
            ->get(['id', 'codigo', 'nombre', 'provincia_id']);
    }

    public function getById(int $id): Ubicacion
    {
        return Ubicacion::findOrFail($id);
    }

    public function create(array $data): Ubicacion
    {
        return Ubicacion::create($data);
    }

    public function update(int $id, array $data): Ubicacion
    {
        $ubicacion = Ubicacion::findOrFail($id);
        $ubicacion->update($data);

        return $ubicacion;
    }

    public function delete(int $id): void
    {
        Ubicacion::findOrFail($id)->delete();
    }
}
