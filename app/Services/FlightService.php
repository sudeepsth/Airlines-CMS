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

    public function flightRecord()
   {
        $flightRecord = BookFlight::join('flights as f','f.id','book_flights.flight_id')
                            ->join('destinations as fd','fd.id','f.from')
                            ->join('destinations as td','td.id','f.to')
                            ->select('book_flights.first_name','book_flights.last_name','book_flights.email','book_flights.address','book_flights.phone_number','book_flights.booking_number','book_flights.total_passenger','f.airlines','f.flight_date','f.flight_time','td.destination as to','fd.destination as from')
                            ->paginate(25);

        return $flightRecord;
   }

}
