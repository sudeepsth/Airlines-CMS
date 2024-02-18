<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DestinationController;
use App\Http\Controllers\Admin\FlightRecordController;
use App\Http\Controllers\Admin\FlightController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('logs', [\Rap2hpoutre\LaravelLogViewer\LogViewerController::class, 'index']);

Route::group([ 'middleware' => ['web', 'auth']], function () {
    Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('signout', [AdminLoginController::class, 'signOut'])->name('signout');
    Route::resource('destination', DestinationController::class);
    Route::resource('flight', FlightController::class);
    Route::get('flight-record', [FlightRecordController::class, 'index'])->name('flight-record.index');

});
Route::get('/', [AdminLoginController::class, 'index'])->name('login');
Route::get('/login', [AdminLoginController::class, 'index'])->name('login');
Route::post('check-login', [AdminLoginController::class, 'adminLogin'])->name('admin.login');
Route::get('register', [AdminLoginController::class, 'registration'])->name('register');
Route::post('register', [AdminLoginController::class, 'storeRegistration'])->name('admin.register');
