<?php

namespace App\Modules\ubicacion\Http\Controllers;

use App\Modules\ubicacion\Http\Requests\UbicacionStoreRequest;
use App\Modules\ubicacion\Http\Requests\UbicacionUpdateRequest;
use Modules\Ubicacion\Services\UbicacionService;

class UbicacionController
{
    public function __construct(
        private readonly UbicacionService $service,
    ) {}

    public function show(int $id)
    {
        return response()->json($this->service->getById($id));
    }

    public function store(UbicacionStoreRequest $request)
    {
        $ubicacion = $this->service->create($request->getData());

        return response()->json($ubicacion, 201);
    }

    public function update(UbicacionUpdateRequest $request, int $id)
    {
        $ubicacion = $this->service->update($id, $request->getData());

        return response()->json($ubicacion);
    }

    public function destroy(int $id)
    {
        $this->service->delete($id);

        return response()->json(['message' => 'Eliminado']);
    }
}
