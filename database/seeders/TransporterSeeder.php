<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TransporterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('transporters')->insert([
            ['code' => 'FR', 'name' => 'Ryanair', 'type' => 'airline'],
            ['code' => 'RR', 'name' => 'Buzz', 'type' => 'airline'],
            ['code' => 'W6', 'name' => 'Wizz Air', 'type' => 'airline'],
            ['code' => 'U2', 'name' => 'EasyJet', 'type' => 'airline'],
            ['code' => 'I2', 'name' => 'Iberia Express', 'type' => 'airline'],
        ]);
    }
}
