<?php

namespace App\Modules\TiposUnidadMedida\Http\Controllers;

use App\Modules\TiposUnidadMedida\Http\Requests\TipoUnidadMedidaStoreRequest;
use App\Modules\TiposUnidadMedida\Http\Requests\TipoUnidadMedidaUpdateRequest;
use App\Modules\TiposUnidadMedida\Services\TipoUnidadMedidaQueryService;
use App\Modules\TiposUnidadMedida\Services\TipoUnidadMedidaService;
use Illuminate\Http\Request;

class TipoUnidadMedidaController
{
    public function __construct(
        private readonly TipoUnidadMedidaService $service,
        private readonly TipoUnidadMedidaQueryService $queryService,
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

    public function store(TipoUnidadMedidaStoreRequest $request)
    {
        $tipo = $this->service->create($request->getData());

        return response()->json($tipo, 201);
    }

    public function update(TipoUnidadMedidaUpdateRequest $request, int $id)
    {
        $tipo = $this->service->update($id, $request->getData());

        return response()->json($tipo);
    }

    public function destroy(int $id)
    {
        $this->service->delete($id);

        return response()->json(['message' => 'Eliminado']);
    }
}
