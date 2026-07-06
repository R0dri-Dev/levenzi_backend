<?php

namespace App\Modules\sedes\Http\Controllers;

use App\Modules\sedes\Http\Requests\SedeStoreRequest;
use App\Modules\sedes\Http\Requests\SedeUpdateRequest;
use App\Modules\sedes\Services\SedeQueryService;
use App\Modules\sedes\Services\SedeService;
use Illuminate\Http\Request;

class SedeController
{
    public function __construct(
        private readonly SedeService $service,
        private readonly SedeQueryService $queryService,
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

    public function store(SedeStoreRequest $request)
    {
        $sede = $this->service->create($request->getData());

        return response()->json($sede, 201);
    }

    public function update(SedeUpdateRequest $request, int $id)
    {
        $sede = $this->service->update($id, $request->getData());

        return response()->json($sede);
    }

    public function destroy(int $id)
    {
        $this->service->delete($id);

        return response()->json(['message' => 'Eliminado']);
    }
}


