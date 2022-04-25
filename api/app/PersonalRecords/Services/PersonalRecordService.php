<?php

namespace App\PersonalRecords\Services;

use App\PersonalRecords\Models\PersonalRecord;
use App\PersonalRecords\Models\Repositories\PersonalRecordRepositoryInterface as PersonalRecordRepository;

class PersonalRecordService
{
    /**
     * @var PersonalRecordRepository
     */
    private $personalRecordRepository;

    /**
     * @param PersonalRecordRepository $personalRecordRepository
     */
    public function __construct(PersonalRecordRepository $personalRecordRepository)
    {
        $this->personalRecordRepository = $personalRecordRepository;
    }

    /**
     * @return mixed
     */
    public function findAll()
    {
        return $this->personalRecordRepository->findAll();
    }

    /**
     * @return mixed
     */
    public function findById(int $personalRecord_id)
    {
        return $this->personalRecordRepository->findById($personalRecord_id);
    }

    /**
     * @param array $data
     * @return PersonalRecord
     */
    public function store(array $data): PersonalRecord
    {
        return $this->personalRecordRepository->store($data);
    }

    /**
     * @param PersonalRecord $personalRecord
     * @param array $data
     * @return PersonalRecord
     */
    public function update(PersonalRecord $personalRecord, array $data): PersonalRecord
    {
        return $this->personalRecordRepository->update($personalRecord, $data);
    }

    /**
     * @param PersonalRecord $personalRecord
     * @return PersonalRecord
     */
    public function enable(PersonalRecord $personalRecord): PersonalRecord
    {
        return $this->personalRecordRepository->enable($personalRecord);
    }

    /**
     * @param PersonalRecord $personalRecord
     * @return PersonalRecord
     */
    public function disable(PersonalRecord $personalRecord): PersonalRecord
    {
        return $this->personalRecordRepository->disable($personalRecord);
    }

    /**
     * @param PersonalRecord $personalRecord
     * @return mixed
     */
    public function destroy(PersonalRecord $personalRecord)
    {
        return $this->personalRecordRepository->destroy($personalRecord);
    }
}
