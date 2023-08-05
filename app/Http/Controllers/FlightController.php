<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFlightRequest;
use App\Models\Flight;
use App\Models\FlightRoute;
use App\Models\Plane;
use Illuminate\Http\Request;

class FlightController extends Controller
{
    const OBJECT = 'admin.flights';
    const DOT = '.';
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view(self::OBJECT . self::DOT . __FUNCTION__, [
            'data' => Flight::with(['flightRoute','plane'])->latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view(self::OBJECT . self::DOT . __FUNCTION__, [
            'flightRoutes' => FlightRoute::all(),
            'planes' => Plane::with('airline')->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFlightRequest $request)
    {
        $data = $request->validated();
        $timeTotalMinutes = $request->input('flight_time_total_minutes');
        $timeStartMinutes = $request->input('flight_time_start_minutes');
        $timeStartHour = $request->input('flight_time_start_hour');
        // Custome and save time data to database
        $data['flight_time_total'] = $request->input('flight_time_total_hour') . 'h' . ($timeTotalMinutes ? $timeTotalMinutes.'p' : '');
        $data['flight_time_start'] = ($timeStartHour < 10 ? '0'.$timeStartHour : $timeStartHour) . ':' . ($timeStartMinutes ?? '00');
        $flight = Flight::query()->create($data);
        if($request->input('break_time') !== null) {
            $flight->flightDetails()->create([
                'flight_id' => $flight->id,
                'break_time' => $request->input('break_time'),
                'intermediate_airport' => $request->input('intermediate_airport'),
            ]);
        }

        toastr()->success('Data has been saved successfully!');
        return redirect()->route('flights.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
