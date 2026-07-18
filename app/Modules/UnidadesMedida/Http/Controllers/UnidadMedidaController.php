<?php

namespace App\Modules\UnidadesMedida\Http\Controllers;

use App\Modules\UnidadesMedida\Http\Requests\UnidadMedidaStoreRequest;
use App\Modules\UnidadesMedida\Http\Requests\UnidadMedidaUpdateRequest;
use App\Modules\UnidadesMedida\Services\UnidadMedidaQueryService;
use App\Modules\UnidadesMedida\Services\UnidadMedidaService;
use Illuminate\Http\Request;

class UnidadMedidaController
{
    public function __construct(
        private readonly UnidadMedidaService $service,
        private readonly UnidadMedidaQueryService $queryService,
    ) {}

    public function index(Request $request)
    {
        $filters = $this->queryService->parseFilters($request->all());

        return response()->json($this->service->list($filters));
    }

    public function show(int $id)
    {
        return response()->json($this->service->getById($id));
    }

    public function store(UnidadMedidaStoreRequest $request)
    {
        $unidad = $this->service->create($request->getData());

        return response()->json($unidad, 201);
    }

    public function update(UnidadMedidaUpdateRequest $request, int $id)
    {
        $unidad = $this->service->update($id, $request->getData());

        return response()->json($unidad);
    }

    public function destroy(int $id)
    {
        $this->service->delete($id);

        return response()->json(['message' => 'Eliminado']);
    }
}
