<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $password = Hash::make('nina');
        $faker = \Faker\Factory::create();

        User::create([
            'name' => 'Nina',
            'email' => 'nina@gmail.com',
            'password' => $password,
        ]);

        for ($i = 0; $i < 20; $i++) {

            User::create([
                'name' => $faker->name,
                'email' => $faker->email,
                'password' => $password,
            ]);
        }
    }
}
