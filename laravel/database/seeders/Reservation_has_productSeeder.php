<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Reservation_has_product;

class Reservation_has_productSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Reservation_has_product::create([
            'amount' => 3.20,
            'pickup_date' => 02-04-2022,
            'fk_product_id' => 1,
            'fk_reservation_id' => 1
        ]);
    }
}
