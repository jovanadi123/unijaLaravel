<?php

namespace Database\Seeders;

use App\Models\Mesto;
use Illuminate\Database\Seeder;

class MestoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $nizMesta = [
          'Beograd',
          'Novi Sad',
          'Pozarevac',
          'Sabac',
          'Nis',
          'Krusevac',
          'Kraljevo',
          'Kragujevac',
          'Leskovac'
        ];

        foreach ($nizMesta as $mesto){
            Mesto::create([
                'nazivMesta' => $mesto
            ]);
        }
    }
}
