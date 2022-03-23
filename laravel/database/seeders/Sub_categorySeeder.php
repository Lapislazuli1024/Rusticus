<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Sub_category;

class Sub_categorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Sub_category::create([
            'description' => 'Schafskäse',
            'fk_main_category_id' => 1
        ]);
    }
}
