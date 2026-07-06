<?php

namespace App\Modules\roles\Http\Controllers;

use App\Modules\roles\Http\Requests\RoleStoreRequest;
use App\Modules\roles\Http\Requests\RoleUpdateRequest;
use App\Modules\roles\Services\RoleQueryService;
use App\Modules\roles\Services\RoleService;
use Illuminate\Http\Request;

class RoleController
{
    public function __construct(
        private readonly RoleService $service,
        private readonly RoleQueryService $queryService,
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

    public function store(RoleStoreRequest $request)
    {
        $role = $this->service->create($request->getData());

        return response()->json($role, 201);
    }

    public function update(RoleUpdateRequest $request, int $id)
    {
        $role = $this->service->update($id, $request->getData());

        return response()->json($role);
    }

    public function destroy(int $id)
    {
        $this->service->delete($id);

        return response()->json(['message' => 'Eliminado']);
    }
}


