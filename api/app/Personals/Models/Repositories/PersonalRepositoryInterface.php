<?php

namespace App\Personals\Models\Repositories;

use App\Personals\Models\Personal;

interface PersonalRepositoryInterface
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
    public function update(Personal $personal, array $data);

    /**
     * @inheritDoc
     */
    public function enable(Personal $personal);

    /**
     * @inheritDoc
     */
    public function disable(Personal $personal);

    /**
     * @inheritDoc
     */
    public function destroy(Personal $personal);
}
