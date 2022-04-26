<?php

namespace App\Personals\Models\Repositories;

use App\Personals\Models\Personal;

class PersonalRepository implements PersonalRepositoryInterface
{
    /**
     * @param int $id
     * @return object | null
     */
    public function findById(int $id): object|null
    {
        return Personal::withTrashed()
            ->findOrFail($id);
    }

    /**
     * @return array | null
     */
    public function findAll()
    {
        return Personal::withTrashed()
            ->get();
    }

    /**
     * @param array $data
     * @return Personal
     */
    public function store(array $data)
    {
        $personal = new Personal;
        $personal->name = $data['name'];
        $personal->save();
        return $personal;
    }

    /**
     * @param Personal $personal
     * @param array $data
     * @return Personal
     */
    public function update(Personal $personal, array $data)
    {
        $personal->name = $data['name'];
        $personal->save();
        return $personal;
    }

    /**
     * @param Personal $personal
     * @return Personal
     */
    public function enable(Personal $personal)
    {
        $personal->restore();
        return $personal;
    }

    /**
     * @param Personal $personal
     * @return Personal
     */
    public function disable(Personal $personal)
    {
        $personal->delete();
        return $personal;
    }

    /**
     * @param Personal $personal
     * @return null
     */
    public function destroy(Personal $personal)
    {
        $personal->forceDelete();
        return null;
    }
}
