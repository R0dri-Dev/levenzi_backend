<?php

namespace App\Modules\instalaciones\Http\Controllers;

use App\Modules\instalaciones\Http\Requests\InstalacionStoreRequest;
use App\Modules\instalaciones\Http\Requests\InstalacionUpdateRequest;
use App\Modules\instalaciones\Services\InstalacionQueryService;
use App\Modules\instalaciones\Services\InstalacionService;
use Illuminate\Http\Request;

class InstalacionController
{
    public function __construct(
        private readonly InstalacionService $service,
        private readonly InstalacionQueryService $queryService,
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

    public function store(InstalacionStoreRequest $request)
    {
        $instalacion = $this->service->create($request->getData());

        return response()->json($instalacion, 201);
    }

    public function update(InstalacionUpdateRequest $request, int $id)
    {
        $instalacion = $this->service->update($id, $request->getData());

        return response()->json($instalacion);
    }

    public function destroy(int $id)
    {
        $this->service->delete($id);

        return response()->json(['message' => 'Eliminado']);
    }
}


