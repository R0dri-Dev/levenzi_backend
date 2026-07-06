<?php

namespace App\Modules\doctores\Http\Controllers;

use App\Modules\doctores\Http\Requests\DoctorStoreRequest;
use App\Modules\doctores\Http\Requests\DoctorUpdateRequest;
use App\Modules\doctores\Services\DoctorQueryService;
use App\Modules\doctores\Services\DoctorService;
use Illuminate\Http\Request;

class DoctorController
{
    public function __construct(
        private readonly DoctorService $service,
        private readonly DoctorQueryService $queryService,
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

    public function store(DoctorStoreRequest $request)
    {
        $doctor = $this->service->create($request->getData());

        return response()->json($doctor, 201);
    }

    public function update(DoctorUpdateRequest $request, int $id)
    {
        $doctor = $this->service->update($id, $request->getData());

        return response()->json($doctor);
    }

    public function destroy(int $id)
    {
        $this->service->delete($id);

        return response()->json(['message' => 'Eliminado']);
    }
}


