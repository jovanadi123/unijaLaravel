<?php

namespace Database\Seeders;

use App\Models\Tim;
use Illuminate\Database\Seeder;

class TimSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $timovi = [
            'IT',
            'PR',
            'CR',
            'AR',
            'HR',
            'UO',
            'Logistika'
        ];

        foreach ($timovi as $tim){
            Tim::create([
                'nazivTima' => $tim
            ]);
        }
    }
}
