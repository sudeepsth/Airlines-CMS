<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Psr\Log\LoggerInterface;
use Illuminate\Database\DatabaseManager;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\Services\FlightService;

class DashboardController extends Controller
{
     /**
     * @var LoggerInterface
     */
    private $log;

     /**
     * @var DatabaseManager
     */
    private $db;

    protected $flightService;

     /**
     * FlightController constructor.
     * @param Flight $flight
     */

    public function __construct(LoggerInterface $log, DatabaseManager $db, FlightService $flightService)
    {
        $this->db = $db;
        $this->log = $log;
        $this->flightService = $flightService;
    }

    public function dashboard()
    {

        $record = $this->flightService->getFlightDetail();
        return view('admin.dashboard',compact('record'));
    }


}
