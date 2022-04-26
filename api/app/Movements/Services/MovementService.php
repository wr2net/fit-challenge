<?php

namespace App\Movements\Services;

use App\Movements\Models\Movement;
use App\Movements\Models\Repositories\MovementRepositoryInterface as MovementRepository;
use App\PersonalRecords\Models\PersonalRecord;
use App\PersonalRecords\Services\PersonalRecordService;
use App\Personals\Services\PersonalService;

class MovementService
{
    /**
     * @var MovementRepository
     */
    private MovementRepository $movementRepository;

    /**
     * @var PersonalService
     */
    private PersonalService $personalService;

    /**
     * @var PersonalRecordService
     */
    private PersonalRecordService $personalRecordService;

    /**
     * @param MovementRepository $movementRepository
     * @param PersonalService $personalService
     * @param PersonalRecordService $personalRecordService
     */
    public function __construct(
        MovementRepository $movementRepository,
        PersonalService $personalService,
        PersonalRecordService $personalRecordService,
    ) {
        $this->movementRepository = $movementRepository;
        $this->personalService = $personalService;
        $this->personalRecordService = $personalRecordService;
    }

    /**
     * @return mixed
     */
    public function findAll()
    {
        return $this->movementRepository->findAll();
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function findById(int $id): mixed
    {
        return $this->movementRepository->findById($id);
    }

    /**
     * @param string $name
     * @return mixed
     */
    public function findByName(string $name): mixed
    {
        return $this->movementRepository->findByName($name);
    }

    /**
     * @param array $data
     * @return Movement
     */
    public function store(array $data): Movement
    {
        return $this->movementRepository->store($data);
    }

    /**
     * @param Movement $movement
     * @param array $data
     * @return Movement
     */
    public function update(Movement $movement, array $data): Movement
    {
        return $this->movementRepository->update($movement, $data);
    }

    /**
     * @param Movement $movement
     * @return Movement
     */
    public function enable(Movement $movement): Movement
    {
        return $this->movementRepository->enable($movement);
    }

    /**
     * @param Movement $movement
     * @return Movement
     */
    public function disable(Movement $movement): Movement
    {
        return $this->movementRepository->disable($movement);
    }

    /**
     * @param Movement $movement
     * @return mixed
     */
    public function destroy(Movement $movement)
    {
        return $this->movementRepository->destroy($movement);
    }

    /**
     * @return array
     */
    public function ranking(): array
    {
        return $this->handleRecords();
    }

    public function byMovement(string $movement_name)
    {
        $movement = $this->findByName($movement_name);
        return $this->handleRecords($movement);
    }

    /**
     * @return array
     */
    private function handleRecords(object $movement = null): array
    {
        $ranking = [];
        if (is_null($movement)) {
            $movements = $this->findAll();
            $users = $this->personalService->findAll();
            foreach ($movements as $mov) {
                $records = $this->personalRecordService->findAll();
                $ranking[] = [
                    "movement" => $mov->name,
                    $this->handleUsers($records, $users, $mov),
                ];
            }
            return $ranking;
        }


        $users = $this->personalService->findAll();
        $records = $this->personalRecordService->findAll();
        $ranking[] = [
            "movement" => $movement->name,
            $this->handleUsers($records, $users, $movement),
        ];

        return $ranking;
    }

    /**
     * @param mixed $records
     * @param mixed $users
     * @param mixed $mov
     * @return array|null
     */
    private function handleUsers(mixed $records, mixed $users, mixed $mov): array|null
    {
        $data = [];
        foreach ($users as $user) {
            $data[] = $this->resolve($user, $records, $mov);
        }

        if (sizeof($data) == 0) {
            return null;
        }

        return $this->handlePodium($data);
    }

    /**
     * @param mixed $user
     * @param mixed $records
     * @param mixed $mov
     * @return array|null
     */
    private function resolve(mixed $user, mixed $records, mixed $mov): array|null
    {
        $rec = [];
        foreach ($records as $record) {
            if ($record->movement_id == $mov->id && $user->id == $record->personal_id) {
                $personalRec = $this->personalRecordService->findByPersonalMovementId($record->personal_id, $record->movement_id);
                $pr = $this->bastResult($personalRec);
                $rec[] = [
                    "user" => $user->name,
                    "score" => $pr['score'],
                    "date" => $pr['datetime'],
                ];
            }
        }

        if (sizeof($rec) == 0) {
            return null;
        }

        return $rec[0];
    }

    /**
     * @param $data
     * @return array
     */
    private function bastResult($data): array
    {
        $score = 0;
        foreach ($data as $d) {
            if ($d->value > $score) {
                $score = $d->value;
                $datetime = $d->date;
            }
        }

        return [
            "score" => $score,
            "datetime" => $datetime,
        ];
    }

    /**
     * @param array $data
     * @return array
     */
    private function handlePodium(array $data): array
    {
        $new_array = [];
        foreach ($data as $d) {
            if (!is_null($d)) {
                $new_array[] = $d;
            }
        }

        array_multisort(array_column($new_array, 'score'), SORT_DESC, $new_array);

        return $this->handlePosition($new_array);
    }

    /**
     * @param array $new_array
     * @return array
     */
    private function handlePosition(array $new_array): array
    {
        $score = 0;
        $last_position = 0;
        $return_array = [];
        foreach ($new_array as $na) {
            if ($na['score'] > $score) {
                $score = $na['score'];
                $last_position = $last_position + 1;
                $na['position'] = $last_position;
                $return_array[] = $na;
            } elseif($na['score'] == $score) {
                $score = $na['score'];
                $na['position'] = $last_position;
                $return_array[] = $na;
            } else {
                $score = $na['score'];
                $last_position = $last_position + 1;
                $na['position'] = $last_position;
                $return_array[] = $na;
            }
        }

        return $return_array;
    }
}
