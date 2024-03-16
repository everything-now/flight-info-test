<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Flight>
 */
class FlightFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $airports = \DB::table('airports')
                ->inRandomOrder()
                ->limit(2)
                ->get();

        $transporter = \DB::table('transporters')
            ->inRandomOrder()
            ->first();
        
        $departureDateTime = Carbon::today()
            ->addDays(rand(0, 30))
            ->addMinutes(rand(1, 1440))
            ->setTimezone($airports->first()->timezone);

        $arrivalDateTime = (clone $departureDateTime)
            ->addMinutes(rand(30, 240))
            ->setTimezone($airports->last()->timezone);

        return [
            'flight_number' => $transporter->code . rand(0, 9999),
            'transporter_id' => $transporter->id,
            'departure_airport_id' => $airports->first()->id,
            'arrival_airport_id' => $airports->last()->id,
            'departure_date_time' => $departureDateTime,
            'arrival_date_time' => $arrivalDateTime,
        ];
    }
}
