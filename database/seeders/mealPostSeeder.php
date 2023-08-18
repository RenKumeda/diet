<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class mealPostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('meals')->insert([
            'date' => '2023-08-18',
            'time' => 2,
            'meal' => 'doria',
            'calorie' => 300,
            'goal' => 500,
            ]);
    }
}
