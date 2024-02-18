<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Psr\Log\LoggerInterface;
use Illuminate\Database\DatabaseManager;
use App\Http\Controllers\Controller;
use App\Models\Admin\Flight;
use App\Models\Admin\BookFlight;
use App\Models\Admin\Destination;
use Carbon\Carbon;
use Illuminate\Support\Str;

class ApiFlightController extends Controller
{
     /**
     * @var LoggerInterface
     */
    private $log;

     /**
     * @var DatabaseManager
     */
    private $db;

     /**
     * @var Flight
     */
    private $flight;

     /**
     * @var BookFlight
     */
    private $bookFlight;
     /**
     * @var Destination
     */
    private $destination;

     /**
     * FlightController constructor.
     * @param Flight $flight
     */

    public function __construct(LoggerInterface $log, DatabaseManager $db, Flight $flight, Destination $destination, BookFlight $bookFlight)
    {
        $this->db = $db;
        $this->log = $log;
        $this->flight = $flight;
        $this->destination = $destination;
        $this->bookFlight = $bookFlight;
    }

    public function getDestinationList()
    {
        $data = $this->destination->select('id','destination')->orderby('destination','Asc')->get();
        return response()->json($data);

    }

    public function searchFlightRecord(Request $request)
    {
        $flight_date = Carbon::parse($request->flight_date)->format('Y-m-d');
        $data = $this->flight->searchFlight($request->from,$request->to,$flight_date);

        return response()->json($data);

    }

    public function bookFlight(Request $request)
    {
        $this->validate($request,[
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'address' => 'required',
            'phone_number' => 'required',

        ]);
        $input = $request->only(['first_name','last_name','address','email','phone_number']);
        $input['total_passenger'] = $request->passenger;
        $input['flight_id'] = $request->id;

        $uniqueId = uniqid();
        $randomString = Str::random(10 - strlen($uniqueId));
        $bookingReference = $uniqueId . $randomString;

        $input['booking_number'] = $bookingReference;

        try{
            $flight = $this->flight->find($request->id);
            $booked_seat = $flight->booked_seat + $request->passenger;
            $flight->update(['booked_seat',$booked_seat]);

            $bookFlight = $this->bookFlight->create($input);
            return response()->json(['status'=>'success','message'=>'Your Flight Booked Successfulyy','passengerRecord'=>$bookFlight]);
        }catch(\Exception $e){
            $this->log->error((string)$e);
            return response()->json(['status'=>'error','message'=>'Error while booking flight']);

        }

    }

    public function getFlightByReference($reference)
    {
       $record = $this->bookFlight->getFlightRecord($reference);
        $message=$record ? "Found" : "Not Found";
       return response()->json(['message'=>$message,'record'=>$record]);

    }

}
