<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiFlightController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::middleware('throttle:100,1')->group(function () {
    Route::get('destination-list', [ApiFlightController::Class, 'getDestinationList']);
    Route::post('search-flight', [ApiFlightController::Class, 'searchFlightRecord']);
    Route::post('book-flight', [ApiFlightController::Class, 'bookFlight']);
    Route::get('track-flight/{reference}', [ApiFlightController::Class, 'getFlightByReference']);

});
