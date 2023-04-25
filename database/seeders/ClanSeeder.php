<?php

namespace Database\Seeders;

use App\Models\Clan;
use Illuminate\Database\Seeder;

class ClanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 100; $i++) {

            Clan::create([
                'ime' => $faker->firstName,
                'prezime' => $faker->lastName,
                'godinaStudija' => rand(1,4),
                'mestoID' => rand(1,9),
                'timID' => rand(1,7),
            ]);
        }

    }
}
