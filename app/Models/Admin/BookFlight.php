<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookFlight extends Model
{
    use HasFactory;

    protected $fillable = [
        'booking_number','flight_id','first_name','last_name','address','email','phone_number','total_passenger'
    ];

   public function getFlightRecord($reference)
   {
        $flightRecord = $this->join('flights as f','f.id','book_flights.flight_id')
                            ->join('destinations as fd','fd.id','f.from')
                            ->join('destinations as td','td.id','f.to')
                            ->select('book_flights.first_name','book_flights.last_name','book_flights.email','book_flights.address','book_flights.phone_number','book_flights.booking_number','book_flights.total_passenger','f.airlines','f.flight_date','f.flight_time','td.destination as to','fd.destination as from')
                            ->where('booking_number',$reference)
                            ->first();

        return $flightRecord;

   }
}
