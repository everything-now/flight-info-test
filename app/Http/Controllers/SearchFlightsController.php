<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchFlightsRequest;
use Illuminate\Http\Request;
use App\Models\Flight;
use App\Http\Resources\SearchFlightCollection;

class SearchFlightsController extends Controller
{
    /**
     * Search flight by aiport of departure, arrival and date.
     * 
     */
    public function search(SearchFlightsRequest $request)
    {
        $departureAirport = $request->searchQuery['departureAirport'];
        $arrivalAirport = $request->searchQuery['arrivalAirport'];
        $departureDate = $request->searchQuery['departureDate'];

        $flights = Flight::filterDepartureAirport($departureAirport)
            ->filterArrivalAirport($arrivalAirport)
            ->filterDepartureDate($departureDate)
            ->with(['transporter', 'departureAirport', 'arrivalAirport'])
            ->orderByDepartureDate()
            ->get();

        return response()->json(new SearchFlightCollection($flights));
    }
}
