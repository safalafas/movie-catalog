<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Movies;
use App\Models\Users;
use App\Models\MoviesUsers;
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
        Users::factory(10)->create();

        Movies::factory(10)->create();

        MoviesUsers::factory(10)->create();
    }
}
