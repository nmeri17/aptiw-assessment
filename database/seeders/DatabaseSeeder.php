<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\{User, Tasks, Category};

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    { // this only runs if the "--seed" flag is added to the migrate command
        User::factory(10)->create();

        Tasks::factory(30)->create();
    }
}
