<?php

namespace App\Modules\Familias\Http\Controllers;

use App\Modules\Familias\Http\Requests\FamiliaStoreRequest;
use App\Modules\Familias\Http\Requests\FamiliaUpdateRequest;
use App\Modules\Familias\Services\FamiliaQueryService;
use App\Modules\Familias\Services\FamiliaService;
use Illuminate\Http\Request;

class FamiliaController
{
    public function __construct(
        private readonly FamiliaService $service,
        private readonly FamiliaQueryService $queryService,
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

    public function store(FamiliaStoreRequest $request)
    {
        $familia = $this->service->create($request->getData());

        return response()->json($familia, 201);
    }

    public function update(FamiliaUpdateRequest $request, int $id)
    {
        $familia = $this->service->update($id, $request->getData());

        return response()->json($familia);
    }

    public function destroy(int $id)
    {
        $this->service->delete($id);

        return response()->json(['message' => 'Eliminado']);
    }
}
