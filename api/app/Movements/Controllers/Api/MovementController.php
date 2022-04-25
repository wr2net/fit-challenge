<?php

namespace App\Movements\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Movements\Models\Movement;
use App\Movements\Requests\MovementRequest;
use App\Movements\Resources\MovementResource;
use App\Movements\Services\MovementService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MovementController extends Controller
{
    private $service;

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
    public function index(Request $request)
    {
        $list = $this->service->findAll();
        return MovementResource::collection($list);
    }

    /**
     * @param MovementRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(MovementRequest $request)
    {
        $movement = $this->service->store($request->validated());
        return response()->json($movement, Response::HTTP_CREATED);
    }

    /**
     * @param Movement $movement
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Movement $movement)
    {
        return response()->json($movement, Response::HTTP_OK);
    }

    /**
     * @param MovementRequest $request
     * @param Movement $movement
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(MovementRequest $request, Movement $movement)
    {
        $movement = $this->service->update($movement, $request->validated());
        return response()->json($movement, Response::HTTP_OK);
    }

    /**
     * @param Movement $movement
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function destroy(Movement $movement)
    {
        $this->service->destroy($movement);
        return response()->json([], Response::HTTP_NO_CONTENT);
    }
}
