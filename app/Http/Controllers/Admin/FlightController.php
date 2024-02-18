<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Psr\Log\LoggerInterface;
use Illuminate\Database\DatabaseManager;
use App\Http\Controllers\Controller;
use App\Models\Admin\Flight;
use App\Http\Requests\Admin\FlightRequest;
use App\Models\Admin\Destination;
use Carbon\Carbon;

class FlightController extends Controller
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
     * @var Destination
     */
    private $destination;

     /**
     * FlightController constructor.
     * @param Flight $flight
     */

    public function __construct(LoggerInterface $log, DatabaseManager $db, Flight $flight, Destination $destination)
    {
        $this->db = $db;
        $this->log = $log;
        $this->flight = $flight;
        $this->destination = $destination;
    }

    public function index()
    {
        $flights = $this->flight->orderby('created_at','DESC')->with('fromDestination','toDestination')->paginate(50);
        return view('admin.flight.index',compact('flights'));
    }

    public function create()
    {
        $destinations = $this->destination->all();

        return view('admin.flight.create',compact('destinations'));
    }

    public function store(FlightRequest $request)
    {
        if($request->from == $request->to)
        {
            return back()->with('error','From date and To date should not be same');
        }
        $datetime = Carbon::createFromFormat('m/d/Y g:i A', $request->flight_date);

        try{
            $this->db->beginTransaction();
            $input = $request->only(['from','to','airlines','flight_code','flight_time','total_seats']);
            $input['flight_date'] = $datetime;
            $this->flight->create($input);
            $this->db->commit();

            return redirect()->route('flight.index')->with('success','Flight added successfully');

        } catch(\Exception $e)
        {
            $this->db->rollBack();
            $this->log->error((string)$e);
            return back()->with('error', 'There was an error creating flight.');
        }
    }

    public function edit($id)
    {
        $flight = $this->flight->find($id);
        $destinations = $this->destination->all();
        $flight_date = Carbon::parse($flight->flight_date)->format('m/d/Y g:i A');
        return view('admin.flight.edit',compact('flight','destinations','flight_date'));
    }

    public function update(FlightRequest $request, $id)
    {
        if($request->from == $request->to)
        {
            return back()->with('error','From date and To date should not be same');
        }
        $datetime = Carbon::createFromFormat('m/d/Y g:i A', $request->flight_date);

        try{
            $this->db->beginTransaction();
            $input = $request->only(['from','to','airlines','flight_code','flight_time','total_seats']);
            $input['flight_date'] = $datetime;
            $this->flight->find($id)->update($input);
            $this->db->commit();

            return redirect()->route('flight.index')->with('success','Flight updated successfully');

        } catch(\Exception $e)
        {
            $this->db->rollBack();
            $this->log->error((string)$e);
            return back()->with('error', 'There was an error updating flight.');
        }
    }

    public function destroy($id)
    {
        try{

            $this->flight->destroy($id);
            return redirect()->route('flight.index')->with('success','flight deleted successfully');

        }catch(\Exception $e){
            $this->log->error((string)$e);
            return back()->with('error', 'There was an error deleting flight.');
        }

    }
}
