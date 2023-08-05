<?php

use App\Http\Controllers\FoundFlightController;
use App\Http\Controllers\TicketController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AirlineController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FlightRouteController;
use App\Http\Controllers\PlaneController;
use App\Http\Controllers\FlightController;

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

Route::resource('admin-auth', AdminController::class);
Route::middleware('admin')->prefix('admin')->group(function(){

    Route::get('/', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    Route::resource('airlines', AirlineController::class);

    Route::resource('flight-route', FlightRouteController::class);

    Route::resource('planes', PlaneController::class);

    Route::resource('flights', FlightController::class);

    Route::resource('tickets', TicketController::class);

});


Route::get('/home', function () {
    return view('client.home');
});
Route::get('flight-client', [FoundFlightController::class, 'index'])
    ->name('home');
Route::post('flight-client', [FoundFlightController::class, 'store'])
    ->name('found.flight.store');


Route::get('/flight', function () {
    return view('client.flight');
});




Route::get('/booking', function () {
    return view('client.bookticket');
});
Route::get('/payment', function () {
    return view('client.payment');
});
Route::get('/checkout', function () {
    return view('client.checkout');
});
