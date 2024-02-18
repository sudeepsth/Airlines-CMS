<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    use HasFactory;

    protected $fillable = [
        'from','to','airlines','flight_code','flight_date','flight_time','total_seats','remaining_seats'
    ];


    public function searchFlight($from,$to,$flight_date)
    {

       $records = $this->join('destinations as fd','fd.id','flights.from')
                        ->join('destinations as td','td.id','flights.to')
                        ->select('flights.id','flights.airlines','flights.flight_date','flights.flight_time','flights.total_seats','flights.booked_seats','fd.destination as from','td.destination as to')
                        ->where('flights.from',$from)
                        ->where('flights.to',$to)
                        ->whereDate('flight_date', '=', $flight_date)
                        ->orderby('flight_date','Asc')
                        ->get();
       return $records;

    }

    public function fromDestination()
    {
        return $this->hasOne(Destination::class,'id','from')->select('id','destination');
    }
    public function toDestination()
    {
        return $this->hasOne(Destination::class,'id','to')->select('id','destination');
    }

}
