<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class weightPostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('weights')->insert([
            'date' => '2023-8-20',
            'now' => 70,
            'goal' => 65,
            'difference' => 5,
            ]);
    }
}
