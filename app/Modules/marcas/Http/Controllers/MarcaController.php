<?php

namespace App\Modules\marcas\Http\Controllers;

use App\Modules\marcas\Http\Requests\MarcaStoreRequest;
use App\Modules\marcas\Http\Requests\MarcaUpdateRequest;
use App\Modules\marcas\Services\MarcaQueryService;
use App\Modules\marcas\Services\MarcaService;
use Illuminate\Http\Request;

class MarcaController
{
    public function __construct(
        private readonly MarcaService $service,
        private readonly MarcaQueryService $queryService,
    ) {
    }

    public function index(Request $request)
    {
        $filters = $this->queryService->parseFilters($request->all());

        return response()->json($this->service->list($filters));
    }

    public function show(int $id)
    {
        return response()->json($this->service->getById($id));
    }

    public function store(MarcaStoreRequest $request)
    {
        $marca = $this->service->create($request->getData());

        return response()->json($marca, 201);
    }

    public function update(MarcaUpdateRequest $request, int $id)
    {
        $marca = $this->service->update($id, $request->getData());

        return response()->json($marca);
    }

    public function destroy(int $id)
    {
        $this->service->delete($id);

        return response()->json(['message' => 'Eliminado']);
    }
}


