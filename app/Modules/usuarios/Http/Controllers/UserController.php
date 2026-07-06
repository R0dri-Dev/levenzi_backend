<?php

namespace App\Modules\usuarios\Http\Controllers;

use App\Modules\usuarios\Http\Requests\UserStoreRequest;
use App\Modules\usuarios\Http\Requests\UserUpdateRequest;
use App\Modules\usuarios\Services\UserQueryService;
use App\Modules\usuarios\Services\UserService;
use Illuminate\Http\Request;

class UserController
{
    public function __construct(
        private readonly UserService $service,
        private readonly UserQueryService $queryService,
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

    public function store(UserStoreRequest $request)
    {
        $user = $this->service->create($request->getData());

        return response()->json($user, 201);
    }

    public function update(UserUpdateRequest $request, int $id)
    {
        $user = $this->service->update($id, $request->getData());

        return response()->json($user);
    }

    public function destroy(int $id)
    {
        $this->service->delete($id);

        return response()->json(['message' => 'Eliminado']);
    }
}


