<?php

namespace App\Modules\companias\Http\Controllers;

use App\Modules\companias\Http\Requests\CompaniaStoreRequest;
use App\Modules\companias\Http\Requests\CompaniaUpdateRequest;
use App\Modules\companias\Services\CompaniaQueryService;
use App\Modules\companias\Services\CompaniaService;
use Illuminate\Http\Request;

class CompaniaController
{
    public function __construct(
        private readonly CompaniaService $service,
        private readonly CompaniaQueryService $queryService,
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

    public function store(CompaniaStoreRequest $request)
    {
        $compania = $this->service->create($request->getData());

        return response()->json($compania, 201);
    }

    public function update(CompaniaUpdateRequest $request, int $id)
    {
        $compania = $this->service->update($id, $request->getData());

        return response()->json($compania);
    }

    public function destroy(int $id)
    {
        $this->service->delete($id);

        return response()->json(['message' => 'Eliminado']);
    }
}
