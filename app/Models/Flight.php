<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Builder;
use Carbon\Carbon;

class Flight extends Model
{
    use HasFactory;

    protected $casts = [
        'departure_date_time' => 'datetime',
        'arrival_date_time' => 'datetime',
    ];

    /**
     * Get the transporter associated with the flight.
     */
    public function transporter(): BelongsTo
    {
        return $this->belongsTo(Transporter::class);
    }

    /**
     * Get the Departure Airport associated with the flight.
     */
    public function departureAirport(): BelongsTo
    {
        return $this->belongsTo(Airport::class);
    }

    /**
     * Get the Arrival Airport associated with the flight.
     */
    public function arrivalAirport(): BelongsTo
    {
        return $this->belongsTo(Airport::class);
    }

    /**
     * Scope a query to find flight by Departure Airport.
     */
    public function scopeFilterDepartureAirport(Builder $query, string $code): void
    {
        $query->whereHas('departureAirport', function (Builder $query) use ($code) {
            $query->where('code', $code);
        });
    }

    /**
     * Scope a query to find flight by Arrival Airport.
     */
    public function scopeFilterArrivalAirport(Builder $query, string $code): void
    {
        $query->whereHas('arrivalAirport', function (Builder $query) use ($code) {
            $query->where('code', $code);
        });
    }

    /**
     * Scope a query to find flight by date.
     */
    public function scopeFilterDepartureDate(Builder $query, string $date): void
    {
        $query->whereDate('departure_date_time', $date);
    }

    /**
     * Scope a query to order flights by departure date.
     */
    public function scopeOrderByDepartureDate(Builder $query): void
    {
        $query->orderBy('departure_date_time');
    }

    /**
     * Get Departure Date Time
     */
    public function getDepartureDateTime()
    {
        return $this->departure_date_time->format('Y-m-d H:i');
    }

    /**
     * Get Arrival Date Time
     */
    public function getArrivalDateTime()
    {
        return $this->arrival_date_time->format('Y-m-d H:i');
    }

    /**
     * Get flight durtion in minutes
     */
    public function getFlightDuration()
    {
        // Set timezones for both dates
        $departureDateTime = $this->departure_date_time->shiftTimezone($this->departureAirport->timezone);
        $arrivalDateTime = $this->arrival_date_time->shiftTimezone($this->arrivalAirport->timezone);

        return $arrivalDateTime->diffinMinutes($departureDateTime);
    }
}
