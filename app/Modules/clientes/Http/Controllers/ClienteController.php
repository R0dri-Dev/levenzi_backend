<?php

namespace App\Modules\clientes\Http\Controllers;

use App\Modules\clientes\Http\Requests\ClienteStoreRequest;
use App\Modules\clientes\Http\Requests\ClienteUpdateRequest;
use App\Modules\clientes\Services\ClienteQueryService;
use App\Modules\clientes\Services\ClienteService;
use Illuminate\Http\Request;

class ClienteController
{
    public function __construct(
        private readonly ClienteService $service,
        private readonly ClienteQueryService $queryService,
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

    public function store(ClienteStoreRequest $request)
    {
        $cliente = $this->service->create($request->getData());

        return response()->json($cliente, 201);
    }

    public function update(ClienteUpdateRequest $request, int $id)
    {
        $cliente = $this->service->update($id, $request->getData());

        return response()->json($cliente);
    }

    public function destroy(int $id)
    {
        $this->service->delete($id);

        return response()->json(['message' => 'Eliminado']);
    }
}


