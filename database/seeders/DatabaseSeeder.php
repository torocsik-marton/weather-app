<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('cities')->insert([
            'name' => 'Budapest',
            'latitude' => 47.497913,
            'longitude' => 19.040236,
        ]);

        DB::table('cities')->insert([
            'name' => 'London',
            'latitude' => 51.509865,
            'longitude' =>  -0.118092,
        ]);
    }
}
