<?php

namespace App\Movements\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Movements\Models\Movement;
use App\Movements\Requests\MovementRequest;
use App\Movements\Resources\MovementResource;
use App\Movements\Services\MovementService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;

class MovementController extends Controller
{
    /**
     * @var MovementService
     */
    private MovementService $service;

    /**
     * @param MovementService $service
     */
    public function __construct(MovementService $service)
    {
        $this->service = $service;
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function index(Request $request): mixed
    {
        $list = $this->service->findAll();
        return MovementResource::collection($list);
    }

    /**
     * @param MovementRequest $request
     * @return JsonResponse
     */
    public function store(MovementRequest $request): JsonResponse
    {
        $movement = $this->service->store($request->validated());
        return response()->json($movement, Response::HTTP_CREATED);
    }

    /**
     * @param int | string $movement_id
     * @return JsonResponse
     */
    public function show(int $movement_id): JsonResponse
    {
        $movement = $this->service->findById($movement_id);
        return response()->json($movement, Response::HTTP_OK);
    }

    /**
     * @param MovementRequest $request
     * @param Movement $movement
     * @return JsonResponse
     */
    public function update(MovementRequest $request, Movement $movement): JsonResponse
    {
        $movement = $this->service->update($movement, $request->validated());
        return response()->json($movement, Response::HTTP_OK);
    }

    /**
     * @param Movement $movement
     * @return JsonResponse
     */
    public function destroy(Movement $movement): JsonResponse
    {
        $this->service->destroy($movement);
        return response()->json([], Response::HTTP_NO_CONTENT);
    }

    /**
     * @return JsonResponse
     */
    public function ranking(): JsonResponse
    {
        $ranking = $this->service->ranking();
        return response()->json($ranking, Response::HTTP_OK);
    }

    /**
     * @param string $movement_name
     * @return JsonResponse
     */
    public function byMovement(string $movement_name): JsonResponse
    {
        $ranking = $this->service->byMovement($movement_name);
        return response()->json($ranking, Response::HTTP_OK);
    }
}
