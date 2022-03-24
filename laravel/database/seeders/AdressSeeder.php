<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Adress;


class AdressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Adress::create([
            'street' => 'Lapis street',
            'house_number' => 69,
            'fk_farmer_id' => 1,
            'fk_town_id' => 1
        ]);
    }
}
