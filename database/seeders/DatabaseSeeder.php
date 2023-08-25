<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(mealPostSeeder::class);
        $this->call(postPostSeeder::class);
        $this->call(trainingPostSeeder::class);
        $this->call(sleepPostSeeder::class);
        $this->call(weightPostSeeder::class);
    }
}
