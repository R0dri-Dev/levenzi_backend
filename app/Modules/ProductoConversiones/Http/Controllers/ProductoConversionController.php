<?php

namespace App\Modules\ProductoConversiones\Http\Controllers;

use App\Modules\ProductoConversiones\Http\Requests\ProductoConversionStoreRequest;
use App\Modules\ProductoConversiones\Http\Requests\ProductoConversionUpdateRequest;
use App\Modules\ProductoConversiones\Services\ProductoConversionQueryService;
use App\Modules\ProductoConversiones\Services\ProductoConversionService;
use Illuminate\Http\Request;

class ProductoConversionController
{
    public function __construct(
        private readonly ProductoConversionService $service,
        private readonly ProductoConversionQueryService $queryService,
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

    public function store(ProductoConversionStoreRequest $request)
    {
        $conversion = $this->service->create($request->getData());

        return response()->json($conversion, 201);
    }

    public function update(ProductoConversionUpdateRequest $request, int $id)
    {
        $conversion = $this->service->update($id, $request->getData());

        return response()->json($conversion);
    }

    public function destroy(int $id)
    {
        $this->service->delete($id);

        return response()->json(['message' => 'Eliminado']);
    }
}
