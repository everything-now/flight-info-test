<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AirportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('airports')->insert([
            ['code' => 'IEV', 'name' => 'Kyiv Zhuliany', 'city' => 'Kyiv', 'timezone' => 'Europe/Kyiv'],
            ['code' => 'KBP', 'name' => 'Kyiv Boryspil', 'city' => 'Boryspil', 'timezone' => 'Europe/Kyiv'],
            ['code' => 'BUD', 'name' => 'Budapest', 'city' => 'Budapest', 'timezone' => 'Europe/Budapest'],
            ['code' => 'VLC', 'name' => 'Valencia', 'city' => 'Valencia', 'timezone' => 'Europe/Madrid'],
            ['code' => 'FRA', 'name' => 'Frankfurt', 'city' => 'Frankfurt am Main', 'timezone' => 'Europe/Berlin'],
            ['code' => 'MRS', 'name' => 'Marseille Provence', 'city' => 'Marseille', 'timezone' => 'Europe/Paris'],
            ['code' => 'KRK', 'name' => 'Krakow', 'city' => 'Krakow', 'timezone' => 'Europe/Warsaw'],
            ['code' => 'BCN', 'name' => 'Barcelona–El Prat', 'city' => 'Barcelona', 'timezone' => 'Europe/Madrid'],
            ['code' => 'PFO', 'name' => 'Paphos ', 'city' => 'Paphos ', 'timezone' => 'Europe/Athens'],
            ['code' => 'DUB', 'name' => 'Dublin ', 'city' => 'Dublin ', 'timezone' => 'Europe/Dublin'],
        ]);
    }
}
