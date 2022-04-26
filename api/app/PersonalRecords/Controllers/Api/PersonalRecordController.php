<?php

namespace App\PersonalRecords\Controllers\Api;

use App\Http\Controllers\Controller;
use App\PersonalRecords\Models\PersonalRecord;
use App\PersonalRecords\Requests\PersonalRecordRequest;
use App\PersonalRecords\Resources\PersonalRecordResource;
use App\PersonalRecords\Services\PersonalRecordService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;

class PersonalRecordController extends Controller
{
    /**
     * @var PersonalRecordService
     */
    private PersonalRecordService $service;

    /**
     * @param PersonalRecordService $service
     */
    public function __construct(PersonalRecordService $service)
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
        return PersonalRecordResource::collection($list);
    }

    /**
     * @param PersonalRecordRequest $request
     * @return JsonResponse
     */
    public function store(PersonalRecordRequest $request): JsonResponse
    {
        $personalRecord = $this->service->store($request->validated());
        return response()->json($personalRecord, Response::HTTP_CREATED);
    }

    /**
     * @param int $personalRecord_id
     * @return JsonResponse
     */
    public function show(int $personalRecord_id): JsonResponse
    {
        $personalRecord = $this->service->findById($personalRecord_id);
        return response()->json($personalRecord, Response::HTTP_OK);
    }

    /**
     * @param PersonalRecordRequest $request
     * @param PersonalRecord $personalRecord
     * @return JsonResponse
     */
    public function update(PersonalRecordRequest $request, PersonalRecord $personalRecord): JsonResponse
    {
        $personalRecord = $this->service->update($personalRecord, $request->validated());
        return response()->json($personalRecord, Response::HTTP_OK);
    }

    /**
     * @param PersonalRecord $personalRecord
     * @return JsonResponse
     */
    public function destroy(PersonalRecord $personalRecord): JsonResponse
    {
        $this->service->destroy($personalRecord);
        return response()->json([], Response::HTTP_NO_CONTENT);
    }
}
