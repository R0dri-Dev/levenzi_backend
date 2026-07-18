<?php

namespace App\Modules\productos\Http\Controllers;

use App\Modules\productos\Http\Requests\ProductoStoreRequest;
use App\Modules\productos\Http\Requests\ProductoUpdateRequest;
use App\Modules\productos\Services\ProductoQueryService;
use App\Modules\productos\Services\ProductoService;
use Illuminate\Http\Request;

class ProductoController
{
    public function __construct(
        private readonly ProductoService $service,
        private readonly ProductoQueryService $queryService,
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

    public function store(ProductoStoreRequest $request)
    {
        $producto = $this->service->create($request->getData());

        return response()->json($producto, 201);
    }

    public function update(ProductoUpdateRequest $request, int $id)
    {
        $producto = $this->service->update($id, $request->getData());

        return response()->json($producto);
    }

    public function destroy(int $id)
    {
        $this->service->delete($id);

        return response()->json(['message' => 'Eliminado']);
    }
}
