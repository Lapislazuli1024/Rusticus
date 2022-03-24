<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        // \App\Models\User::factory(10)->create();
        $this->call([
            AdminSeeder::class,
            AddressSeeder::class,
            CustomerSeeder::class,
            FarmerSeeder::class,
            Main_categorySeeder::class,
            ProductSeeder::class,
            Reservation_has_productSeeder::class,
            ReservationSeeder::class,
            Session_has_productSeeder::class,
            SessioncartSeeder::class,
            Sub_categorySeeder::class,
            TownSeeder::class,
            Unit_of_measureSeeder::class,
            UserSeeder::class,
            WebpageSeeder::class,
        ]);
    }
}
