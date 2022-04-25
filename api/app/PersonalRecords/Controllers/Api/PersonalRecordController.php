<?php

namespace App\PersonalRecords\Controllers\Api;

use App\Http\Controllers\Controller;
use App\PersonalRecords\Models\PersonalRecord;
use App\PersonalRecords\Requests\PersonalRecordRequest;
use App\PersonalRecords\Resources\PersonalRecordResource;
use App\PersonalRecords\Services\PersonalRecordService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PersonalRecordController extends Controller
{
    private $service;

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
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(PersonalRecordRequest $request)
    {
        $personalRecord = $this->service->store($request->validated());
        return response()->json($personalRecord, Response::HTTP_CREATED);
    }

    /**
     * @param PersonalRecord $personalRecord
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(PersonalRecord $personalRecord)
    {
        return response()->json($personalRecord, Response::HTTP_OK);
    }

    /**
     * @param PersonalRecordRequest $request
     * @param PersonalRecord $personalRecord
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(PersonalRecordRequest $request, PersonalRecord $personalRecord)
    {
        $personalRecord = $this->service->update($personalRecord, $request->validated());
        return response()->json($personalRecord, Response::HTTP_OK);
    }

    /**
     * @param PersonalRecord $personalRecord
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function destroy(PersonalRecord $personalRecord)
    {
        $this->authorize('destroy', $personalRecord);
        $this->service->destroy($personalRecord);
        return response()->json([], Response::HTTP_NO_CONTENT);
    }
}
