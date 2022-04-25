<?php

namespace App\Movements\Models\Repositories;

use App\Movements\Models\Movement;

interface MovementRepositoryInterface
{
    /**
     * @inheritDoc
     */
    public function findById(int $id);

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
    public function update(Movement $movement, array $data);

    /**
     * @inheritDoc
     */
    public function enable(Movement $movement);

    /**
     * @inheritDoc
     */
    public function disable(Movement $movement);

    /**
     * @inheritDoc
     */
    public function destroy(Movement $movement);
}
