<?php
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


});

