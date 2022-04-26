<?php

namespace App\Personals\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Personals\Models\Personal;
use App\Personals\Requests\PersonalRequest;
use App\Personals\Resources\PersonalResource;
use App\Personals\Services\PersonalService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;

class PersonalController extends Controller
{
    /**
     * @var PersonalService
     */
    private PersonalService $service;

    /**
     * @param PersonalService $service
     */
    public function __construct(PersonalService $service)
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
        return PersonalResource::collection($list);
    }

    /**
     * @param PersonalRequest $request
     * @return JsonResponse
     */
    public function store(PersonalRequest $request): JsonResponse
    {
        $personal = $this->service->store($request->validated());
        return response()->json($personal, Response::HTTP_CREATED);
    }

    /**
     * @param int $personal_id
     * @return JsonResponse
     */
    public function show(int $personal_id): JsonResponse
    {
        $personal = $this->service->findById($personal_id);
        return response()->json($personal, Response::HTTP_OK);
    }

    /**
     * @param PersonalRequest $request
     * @param Personal $personal
     * @return JsonResponse
     */
    public function update(PersonalRequest $request, Personal $personal): JsonResponse
    {
        $personal = $this->service->update($personal, $request->validated());
        return response()->json($personal, Response::HTTP_OK);
    }

    /**
     * @param Personal $personal
     * @return JsonResponse
     */
    public function destroy(Personal $personal): JsonResponse
    {
        $this->service->destroy($personal);
        return response()->json([], Response::HTTP_NO_CONTENT);
    }
}
