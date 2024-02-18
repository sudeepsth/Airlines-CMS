<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Admin\Flight;

class FlightDetailTableSeeder extends Seeder
{
     /**
     * @var Flight
     */
    private $flight;

    /**
     * Run the database seeds.
     */
    public function __construct(Flight $flight)
    {
        $this->flight = $flight;
    }

    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        $this->flight->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        $destinations = [

            [
                'airlines'=>'Emirate',
                'flight_code'=>'A210',
                'from' =>1,
                'to'=>2,
                'flight_date'=>'2024-02-25 10:30:00',
                'flight_time' =>330,
                'total_seats' =>380
             ],
             [
                'airlines'=>'Emirate',
                'flight_code'=>'A210',
                'from' =>1,
                'to'=>3,
                'flight_date'=>'2024-02-25 10:30:00',
                'flight_time' =>330,
                'total_seats' =>380
             ],
             [
                'airlines'=>'Emirate',
                'flight_code'=>'A210',
                'from' =>1,
                'to'=>4,
                'flight_date'=>'2024-02-25 10:30:00',
                'flight_time' =>330,
                'total_seats' =>380
             ],
             [
                'airlines'=>'Emirate',
                'flight_code'=>'A210',
                'from' =>1,
                'to'=>5,
                'flight_date'=>'2024-02-25 10:30:00',
                'flight_time' =>330,
                'total_seats' =>380
             ],
             [
                'airlines'=>'Emirate',
                'flight_code'=>'A210',
                'from' =>1,
                'to'=>6,
                'flight_date'=>'2024-02-25 10:30:00',
                'flight_time' =>330,
                'total_seats' =>380
             ],
             [
                'airlines'=>'Emirate',
                'flight_code'=>'A210',
                'from' =>1,
                'to'=>7,
                'flight_date'=>'2024-02-25 10:30:00',
                'flight_time' =>330,
                'total_seats' =>380
             ],

             //
             [
                'airlines'=>'Birtis Airways',
                'flight_code'=>'A310',
                'from' =>1,
                'to'=>2,
                'flight_date'=>'2024-02-25 13:30:00',
                'flight_time' =>330,
                'total_seats' =>380
             ],
             [
                'airlines'=>'Birtis Airways',
                'flight_code'=>'A310',
                'from' =>1,
                'to'=>3,
                'flight_date'=>'2024-02-25 13:30:00',
                'flight_time' =>330,
                'total_seats' =>380
             ],
             [
                'airlines'=>'Birtis Airways',
                'flight_code'=>'A310',
                'from' =>1,
                'to'=>4,
                'flight_date'=>'2024-02-25 13:30:00',
                'flight_time' =>330,
                'total_seats' =>380
             ],
             [
                'airlines'=>'Birtis Airways',
                'flight_code'=>'A310',
                'from' =>1,
                'to'=>5,
                'flight_date'=>'2024-02-25 13:30:00',
                'flight_time' =>330,
                'total_seats' =>380
             ],
             [
                'airlines'=>'Birtis Airways',
                'flight_code'=>'A310',
                'from' =>1,
                'to'=>6,
                'flight_date'=>'2024-02-25 13:30:00',
                'flight_time' =>330,
                'total_seats' =>380
             ],
             [
                'airlines'=>'Birtis Airways',
                'flight_code'=>'A310',
                'from' =>1,
                'to'=>7,
                'flight_date'=>'2024-02-25 13:30:00',
                'flight_time' =>330,
                'total_seats' =>380
             ],

             //

             [
                'airlines'=>'Qatar Airways',
                'flight_code'=>'A330',
                'from' =>1,
                'to'=>2,
                'flight_date'=>'2024-02-25 15:30:00',
                'flight_time' =>400,
                'total_seats' =>380
             ],
             [
                'airlines'=>'Qatar Airways',
                'flight_code'=>'A330',
                'from' =>1,
                'to'=>3,
                'flight_date'=>'2024-02-25 15:30:00',
                'flight_time' =>400,
                'total_seats' =>380
             ],
             [
                'airlines'=>'Qatar Airways',
                'flight_code'=>'A330',
                'from' =>1,
                'to'=>4,
                'flight_date'=>'2024-02-25 15:30:00',
                'flight_time' =>400,
                'total_seats' =>380
             ],
             [
                'airlines'=>'Qatar Airways',
                'flight_code'=>'A330',
                'from' =>1,
                'to'=>5,
                'flight_date'=>'2024-02-25 15:30:00',
                'flight_time' =>400,
                'total_seats' =>380
             ],
             [
                'airlines'=>'Qatar Airways',
                'flight_code'=>'A330',
                'from' =>1,
                'to'=>6,
                'flight_date'=>'2024-02-25 15:30:00',
                'flight_time' =>400,
                'total_seats' =>380
             ],
             [
                'airlines'=>'Qatar Airways',
                'flight_code'=>'A330',
                'from' =>1,
                'to'=>6,
                'flight_date'=>'2024-02-25 15:30:00',
                'flight_time' =>400,
                'total_seats' =>380
             ],


        ];


        $this->flight->insert($destinations);
    }
}
