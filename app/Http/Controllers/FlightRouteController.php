<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateFlightRouteRequest;
use App\Models\FlightRoute;
use Illuminate\Http\Request;
use App\Http\Requests\StoreFlightRouteRequest;

class FlightRouteController extends Controller
{
    const OBJECT = 'admin.flights-route';
    const DOT = '.';
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = FlightRoute::query()->latest()->get();
        return view(self::OBJECT . self::DOT . __FUNCTION__, compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view(self::OBJECT . self::DOT . __FUNCTION__);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFlightRouteRequest $request, FlightRoute $flightRoute)
    {
        $flightRoute->create($request->validated());
        toastr()->success('Data has been saved successfully!');
        return redirect()->route('flight-route.index');
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
    public function edit(FlightRoute $flightRoute)
    {
        return view(self::OBJECT . self::DOT . __FUNCTION__, compact('flightRoute'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFlightRouteRequest $request, FlightRoute $flightRoute)
    {
        $flightRoute->update($request->validated());
        toastr()->success('Data has been updated successfully!');
        return redirect()->route('flight-route.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FlightRoute $flightRoute)
    {
        $flightRoute->delete();
        toastr()->success('Data has been deleted successfully!');
        return back();
    }
}
