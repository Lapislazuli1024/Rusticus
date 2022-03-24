<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Webpage;

class WebpageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Webpage::create([
            'image' => '/images/web.png',
            'title' => 'Webpage of John',
            'description' => 'lorem ipsum'
        ]);
    }
}
