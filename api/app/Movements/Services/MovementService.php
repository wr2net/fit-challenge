<?php

namespace App\Movements\Services;

use App\Movements\Models\Movement;
use App\Movements\Models\Repositories\MovementRepositoryInterface as MovementRepository;

class MovementService
{
    /**
     * @var MovementRepository
     */
    private MovementRepository $movementRepository;

    /**
     * @param MovementRepository $movementRepository
     */
    public function __construct(MovementRepository $movementRepository)
    {
        $this->movementRepository = $movementRepository;
    }

    /**
     * @return mixed
     */
    public function findAll()
    {
        return $this->movementRepository->findAll();
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
}
