<?php

namespace App\PersonalRecords\Models\Repositories;

use App\PersonalRecords\Models\PersonalRecord;
use Exception;

class PersonalRecordRepository implements PersonalRecordRepositoryInterface
{
    /**
     * @param int $id
     * @return array | null
     */
    public function findById(int $id)
    {
        return PersonalRecord::withTrashed()
            ->findOrFail($id);
    }

    /**
     * @param int $id
     * @return object|null
     */
    public function findByMovementId(int $id): object | null
    {
        return PersonalRecord::withTrashed()
            ->where('movement_id', $id)
            ->first();
    }

    /**
     * @param int $id
     * @return object|null
     */
    public function findByPersonalId(int $id): object | null
    {
        return PersonalRecord::withTrashed()
            ->where('personal_id', $id)
            ->first();
    }

    /**
     * @param int $personal_id
     * @param int $movement_id
     * @return object|null
     */
    public function findByPersonalMovementId(int $personal_id, int $movement_id): object | null
    {
        return PersonalRecord::withTrashed()
            ->where('personal_id', $personal_id)
            ->where('movement_id', $movement_id)
            ->get();
    }

    /**
     * @return array | null
     */
    public function findAll()
    {
        return PersonalRecord::withTrashed()
            ->get();
    }

    /**
     * @param array $data
     * @return PersonalRecord
     */
    public function store(array $data)
    {
        $personalRecord = new PersonalRecord;
        $personalRecord->personal_id = $data['personal_id'];
        $personalRecord->movement_id = $data['movement_id'];
        $personalRecord->value = $data['value'];
        $personalRecord->date = $data['date'];
        $personalRecord->save();
        return $personalRecord;
    }

    /**
     * @param PersonalRecord $personalRecord
     * @param array $data
     * @return PersonalRecord
     */
    public function update(PersonalRecord $personalRecord, array $data)
    {
        $personalRecord->personal_id = $data['personal_id'];
        $personalRecord->movement_id = $data['movement_id'];
        $personalRecord->value = $data['value'];
        $personalRecord->date = $data['date'];
        $personalRecord->save();
        return $personalRecord;
    }

    /**
     * @param PersonalRecord $personalRecord
     * @return PersonalRecord
     */
    public function enable(PersonalRecord $personalRecord)
    {
        $personalRecord->restore();
        return $personalRecord;
    }

    /**
     * @param PersonalRecord $personalRecord
     * @return PersonalRecord
     */
    public function disable(PersonalRecord $personalRecord)
    {
        $personalRecord->delete();
        return $personalRecord;
    }

    /**
     * @param PersonalRecord $personalRecord
     * @return null
     */
    public function destroy(PersonalRecord $personalRecord)
    {
        $personalRecord->forceDelete();
        return null;
    }
}
