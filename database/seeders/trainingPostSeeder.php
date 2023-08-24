<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class trainingPostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('trainings')->insert([
            'training' => 'run',
            'date' => '2023-08-18',
            'time' => '00:20:00', 
            'calorie' => 100,
            'goal' => 300,
            ]);
    }
}
