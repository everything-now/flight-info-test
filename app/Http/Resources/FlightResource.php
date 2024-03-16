<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FlightResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'flightNumber' => $this->flight_number,
            'departureAirport' => $this->departureAirport->code,
            'arrivalAirport' => $this->arrivalAirport->code,
            'departureDateTime' => $this->getDepartureDateTime(),
            'arrivalDateTime' => $this->getArrivalDateTime(),
            'duration' => $this->getFlightDuration(),
            'transporter' => [
                'code' => $this->transporter->code,
                'name' => $this->transporter->name,
            ],
        ];
    }
}
