<?php

namespace Database\Seeders;

use App\Models\User;
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
        $this->call(UserSeeder::class);
        \App\Models\Category::factory(10)->create();
        User::factory()
        ->count(10)
        ->hasPosts(3)
        ->create();
        // \App\Models\User::factory(10)->create();
    }
}
