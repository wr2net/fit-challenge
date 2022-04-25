<?php

namespace App\Movements\Models\Repositories;

use App\Movements\Models\Movement;
use Exception;

class MovementRepository implements MovementRepositoryInterface
{
    /**
     * @param int $id
     * @return array | null
     */
    public function findById(int $id)
    {
        return Movement::withTrashed()
            ->findOrFail($id);
    }

    /**
     * @return array | null
     */
    public function findAll()
    {
        return Movement::withTrashed()
            ->get();
    }

    /**
     * @param array $data
     * @return Movement
     */
    public function store(array $data)
    {
        $movement = new Movement;
        $movement->name = $data['name'];
        $movement->save();
        return $movement;
    }

    /**
     * @param Movement $movement
     * @param array $data
     * @return Movement
     */
    public function update(Movement $movement, array $data)
    {
        $movement->name = $data['name'];
        $movement->save();
        return $movement;
    }

    /**
     * @param Movement $movement
     * @return Movement
     */
    public function enable(Movement $movement)
    {
        $movement->restore();
        return $movement;
    }

    /**
     * @param Movement $movement
     * @return Movement
     */
    public function disable(Movement $movement)
    {
        $movement->delete();
        return $movement;
    }

    /**
     * @param Movement $movement
     * @return null
     */
    public function destroy(Movement $movement)
    {
        $movement->forceDelete();
        return null;
    }
}
