<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePlaneRequest;
use App\Http\Requests\UpdatePlaneRequest;
use App\Models\Airline;
use App\Models\Plane;
use Illuminate\Http\Request;

class PlaneController extends Controller
{
    const OBJECT = 'admin.planes';
    const DOT = '.';
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view(self::OBJECT . self::DOT . __FUNCTION__, [
            'data' => Plane::with('airline')->latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view(self::OBJECT . self::DOT. __FUNCTION__, [
            'airlines' => Airline::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePlaneRequest $request)
    {
        Plane::create($request->validated());
        toastr()->success('Data has been saved successfully!');
        return redirect()->route('planes.index');
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
    public function edit(Plane $plane)
    {
        return view(self::OBJECT . self::DOT . __FUNCTION__, [
            'plane' => $plane,
            'airlines' => Airline::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePlaneRequest $request, Plane $plane)
    {
        $data = $request->validated();
        $plane->update($data);
        toastr()->success('Data has been updated successfully!');
        return redirect()->route('planes.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Plane $plane)
    {
        $plane->delete();
        toastr()->success('Data has been deleted successfully!');
        return redirect()->back();
    }
}
