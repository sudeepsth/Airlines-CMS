<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DestinationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $destinations = [
            [
                'id' => 1,
               'destination'=>'London'
            ],
            [
                'id' => 2,
               'destination'=>'Paris'
            ],
            [
                'id' => 3,
               'destination'=>'Manchester'
            ],
            [
                'id' => 4,
               'destination'=>'Kathmandu'
            ],
            [
                'id' => 5,
               'destination'=>'Texas'
            ],
            [
                'id' => 6,
               'destination'=>'California'
            ],
            [
                'id' => 7,
               'destination'=>'Mumbai'
            ],

        ];

        DB::table('destinations')->insert($destinations);
    }
}
