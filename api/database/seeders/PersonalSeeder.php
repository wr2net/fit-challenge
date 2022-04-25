<?php

namespace Database\Seeders;

use App\Personals\Models\Personal;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PersonalSeeder extends Seeder
{
    /**
     * @var array
     */
    private $list = [
        [
            'name' => 'Joao',
        ],
        [
            'name' => 'Jose',
        ],
        [
            'name' => 'Paulo',
        ],
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->list as $data) {
            $personal = new Personal();
            $personal->name = $data['name'];
            $personal->save();
        }
    }
}
