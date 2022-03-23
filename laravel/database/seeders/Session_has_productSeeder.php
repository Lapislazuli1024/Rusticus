<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Session_has_product;

class Session_has_productSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Session_has_product::create([
            'amount' => 2.30,
            'fk_sessioncart_id' => 1,
            'fk_product_id' => 1
        ]);
    }
}
