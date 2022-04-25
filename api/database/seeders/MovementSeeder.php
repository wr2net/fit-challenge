<?php

namespace Database\Seeders;

use App\Movements\Models\Movement;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MovementSeeder extends Seeder
{
    /**
     * @var array
     */
    private $list = [
        [
            'name' => 'Deadlift',
        ],
        [
            'name' => 'Back Squat',
        ],
        [
            'name' => 'Bench Press',
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
            $movement = new Movement();
            $movement->name = $data['name'];
            $movement->save();
        }
    }
}
