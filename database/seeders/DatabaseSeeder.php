<?php

namespace Database\Seeders;

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
        $this->call(TimSeeder::class);
        $this->call(MestoSeeder::class);
        $this->call(ClanSeeder::class);
        $this->call(UserSeeder::class);
    }
}
