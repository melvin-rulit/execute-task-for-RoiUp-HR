<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
         \App\Models\Client::create([
             'name' => 'Manager',
             'phone_number' => '+380000000000',
             'generation_links' => 'fhuefhreifyegyrfgtweeuyg',
         ]);
    }
}
