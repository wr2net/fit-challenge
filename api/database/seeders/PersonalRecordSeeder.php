<?php

namespace Database\Seeders;

use App\PersonalRecords\Models\PersonalRecord;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PersonalRecordSeeder extends Seeder
{
    /**
     * @var array
     */
    private $list = [
        [
            'id' => 1,
            'personal_id' => 1,
            'movement_id' => 1,
            'value' => 100.0,
            'date' => '2021-01-01 00:00:00.0',
        ],
        [
            'id' => 2,
            'personal_id' => 1,
            'movement_id' => 1,
            'value' => 180.0,
            'date' => '2021-01-02 00:00:00.0',
        ],
        [
            'id' => 3,
            'personal_id' => 1,
            'movement_id' => 1,
            'value' => 150.0,
            'date' => '2021-01-03 00:00:00.0',
        ],
        [
            'id' => 4,
            'personal_id' => 1,
            'movement_id' => 1,
            'value' => 110.0,
            'date' => '2021-01-04 00:00:00.0',
        ],
        [
            'id' => 5,
            'personal_id' => 2,
            'movement_id' => 1,
            'value' => 110.0,
            'date' => '2021-01-04 00:00:00.0',
        ],
        [
            'id' => 6,
            'personal_id' => 2,
            'movement_id' => 1,
            'value' => 140.0,
            'date' => '2021-01-05 00:00:00.0',
        ],
        [
            'id' => 7,
            'personal_id' => 2,
            'movement_id' => 1,
            'value' => 190.0,
            'date' => '2021-01-06 00:00:00.0',
        ],
        [
            'id' => 8,
            'personal_id' => 3,
            'movement_id' => 1,
            'value' => 170.0,
            'date' => '2021-01-01 00:00:00.0',
        ],
        [
            'id' => 9,
            'personal_id' => 3,
            'movement_id' => 1,
            'value' => 120.0,
            'date' => '2021-01-02 00:00:00.0',
        ],
        [
            'id' => 10,
            'personal_id' => 3,
            'movement_id' => 1,
            'value' => 130.0,
            'date' => '2021-01-03 00:00:00.0',
        ],
        [
            'id' => 11,
            'personal_id' => 1,
            'movement_id' => 2,
            'value' => 130.0,
            'date' => '2021-01-03 00:00:00.0',
        ],
        [
            'id' => 12,
            'personal_id' => 2,
            'movement_id' => 2,
            'value' => 130.0,
            'date' => '2021-01-03 00:00:00.0',
        ],
        [
            'id' => 13,
            'personal_id' => 3,
            'movement_id' => 2,
            'value' => 125.0,
            'date' => '2021-01-03 00:00:00.0',
        ],
        [
            'id' => 14,
            'personal_id' => 1,
            'movement_id' => 2,
            'value' => 110.0,
            'date' => '2021-01-05 00:00:00.0',
        ],
        [
            'id' => 15,
            'personal_id' => 1,
            'movement_id' => 2,
            'value' => 100.0,
            'date' => '2021-01-01 00:00:00.0',
        ],
        [
            'id' => 16,
            'personal_id' => 2,
            'movement_id' => 2,
            'value' => 120.0,
            'date' => '2021-01-01 00:00:00.0',
        ],
        [
            'id' => 17,
            'personal_id' => 3,
            'movement_id' => 2,
            'value' => 120.0,
            'date' => '2021-01-01 00:00:00.0',
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
            $personalRecord = new PersonalRecord();
            $personalRecord->personal_id = $data['personal_id'];
            $personalRecord->movement_id = $data['movement_id'];
            $personalRecord->value = $data['value'];
            $personalRecord->date = $data['date'];
            $personalRecord->save();
        }
    }
}
