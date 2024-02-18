<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Psr\Log\LoggerInterface;
use Illuminate\Database\DatabaseManager;
use App\Http\Controllers\Controller;
use App\Models\Admin\BookFlight;
use Carbon\Carbon;
use App\Services\FlightService;

class FlightRecordController extends Controller
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
     * @var BookFlight
     */
    private $bookFlight;

     /**
     * @var FlightService
     */
    private $flightService;

     /**
     * FlightController constructor.
     * @param Flight $flight
     */

    public function __construct(LoggerInterface $log, DatabaseManager $db, BookFlight $bookFlight, FlightService $flightService)
    {
        $this->db = $db;
        $this->log = $log;
        $this->bookFlight = $bookFlight;
        $this->flightService = $flightService;
    }

    public function index()
    {
        $flightRecords = $this->flightService->flightRecord();
        return view('admin.flight-record.index',compact('flightRecords'));
    }



}
