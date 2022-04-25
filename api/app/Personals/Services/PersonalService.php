<?php

namespace App\Personals\Services;

use App\Personals\Models\Personal;
use App\Personals\Models\Repositories\PersonalRepositoryInterface as PersonalRepository;

class PersonalService
{
    /**
     * @var PersonalRepository
     */
    private PersonalRepository $personalRepository;

    /**
     * @param PersonalRepository $personalRepository
     */
    public function __construct(PersonalRepository $personalRepository)
    {
        $this->personalRepository = $personalRepository;
    }

    /**
     * @return mixed
     */
    public function findAll()
    {
        return $this->personalRepository->findAll();
    }

    /**
     * @param array $data
     * @return Personal
     */
    public function store(array $data): Personal
    {
        return $this->personalRepository->store($data);
    }

    /**
     * @param Personal $personal
     * @param array $data
     * @return Personal
     */
    public function update(Personal $personal, array $data): Personal
    {
        return $this->personalRepository->update($personal, $data);
    }

    /**
     * @param Personal $personal
     * @return Personal
     */
    public function enable(Personal $personal): Personal
    {
        return $this->personalRepository->enable($personal);
    }

    /**
     * @param Personal $personal
     * @return Personal
     */
    public function disable(Personal $personal): Personal
    {
        return $this->personalRepository->disable($personal);
    }

    /**
     * @param Personal $personal
     * @return mixed
     */
    public function destroy(Personal $personal)
    {
        return $this->personalRepository->destroy($personal);
    }
}
