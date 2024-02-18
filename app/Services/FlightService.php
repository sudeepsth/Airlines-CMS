<?php

namespace App\Services;

use App\Models\Admin\Flight;
use App\Models\Admin\BookFlight;

class FlightService
{
    public function getFlightDetail()
    {
        $record['total_booked'] = BookFlight::count();
        $record['total_flight'] = Flight::count();
        return $record;
    }

}
