<?php

namespace App\Personals\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Personals\Models\Personal;
use App\Personals\Requests\PersonalRequest;
use App\Personals\Resources\PersonalResource;
use App\Personals\Services\PersonalService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PersonalController extends Controller
{
    private $service;

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
    public function index(Request $request)
    {
        $list = $this->service->findAll();
        return PersonalResource::collection($list);
    }

    /**
     * @param PersonalRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(PersonalRequest $request)
    {
        $personal = $this->service->store($request->validated());
        return response()->json($personal, Response::HTTP_CREATED);
    }

    /**
     * @param Personal $personal
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Personal $personal)
    {
        return response()->json($personal, Response::HTTP_OK);
    }

    /**
     * @param PersonalRequest $request
     * @param Personal $personal
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(PersonalRequest $request, Personal $personal)
    {
        $personal = $this->service->update($personal, $request->validated());
        return response()->json($personal, Response::HTTP_OK);
    }

    /**
     * @param Personal $personal
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function destroy(Personal $personal)
    {
        $this->authorize('destroy', $personal);
        $this->service->destroy($personal);
        return response()->json([], Response::HTTP_NO_CONTENT);
    }
}
