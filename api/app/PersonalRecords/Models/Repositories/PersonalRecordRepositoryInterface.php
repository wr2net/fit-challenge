<?php

namespace App\PersonalRecords\Models\Repositories;

use App\PersonalRecords\Models\PersonalRecord;

interface PersonalRecordRepositoryInterface
{
    /**
     * @inheritDoc
     */
    public function findById(int $id);

    /**
     * @inheritDoc
     */
    public function findByMovementId(int $id);

    /**
     * @inheritDoc
     */
    public function findByPersonalId(int $id);

    /**
     * @inheritDoc
     */
    public function findByPersonalMovementId(int $personal_id, int $movement_id);

    /**
     * @inheritDoc
     */
    public function findAll();

    /**
     * @inheritDoc
     */
    public function store(array $data);

    /**
     * @inheritDoc
     */
    public function update(PersonalRecord $personalRecord, array $data);

    /**
     * @inheritDoc
     */
    public function enable(PersonalRecord $personalRecord);

    /**
     * @inheritDoc
     */
    public function disable(PersonalRecord $personalRecord);

    /**
     * @inheritDoc
     */
    public function destroy(PersonalRecord $personalRecord);
}
