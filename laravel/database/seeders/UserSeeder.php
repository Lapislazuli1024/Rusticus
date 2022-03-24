<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'surname' => 'Doe',
            'name' => 'John',
            'email' => 'john.doe@gmail.com',
            'password' => bcrypt('password'),
            'salt' => 'urmum',
            'remember_token' => '123kdhakkbsnkdbkwahd7674548359897dslkjbkjs'
        ]);
    }
}
