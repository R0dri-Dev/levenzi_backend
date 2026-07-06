<?php

namespace App\Modules\modulos\Http\Controllers;

use App\Modules\modulos\Http\Requests\ModuloStoreRequest;
use App\Modules\modulos\Http\Requests\ModuloUpdateRequest;
use App\Modules\modulos\Services\ModuloQueryService;
use App\Modules\modulos\Services\ModuloService;
use Illuminate\Http\Request;

class ModuloController
{
    public function __construct(
        private readonly ModuloService $service,
        private readonly ModuloQueryService $queryService,
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

    public function store(ModuloStoreRequest $request)
    {
        $modulo = $this->service->create($request->getData());

        return response()->json($modulo, 201);
    }

    public function update(ModuloUpdateRequest $request, int $id)
    {
        $modulo = $this->service->update($id, $request->getData());

        return response()->json($modulo);
    }

    public function destroy(int $id)
    {
        $this->service->delete($id);

        return response()->json(['message' => 'Eliminado']);
    }
}


