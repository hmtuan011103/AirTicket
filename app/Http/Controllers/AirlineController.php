<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAirlineRequest;
use App\Http\Requests\UpdateAirlineRequest;
use App\Models\Airline;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AirlineController extends Controller
{
    const OBJECT = 'admin.airlines';
    const DOT = '.';

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Airline::query()->latest()->get();
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
    public function store(StoreAirlineRequest $request, Airline $airline)
    {
        $data = $request->validated();
        $file = $request->file('file_upload');
        $path = $file->store('airlines', 'public');
        $data['image'] = $path;
        $airline->create($data);
        toastr()->success('Data has been saved successfully!');
        return redirect()->route('airlines.index');
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
    public function edit(Airline $airline)
    {
        return view('admin.airlines.edit', compact('airline'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAirlineRequest $request, Airline $airline)
    {
        $data = $request->validated();
        $image_path = 'storage/' . $airline->image;
        if($request->hasFile('file_upload')){
            if(File::exists($image_path)) {
                File::delete($image_path);
            }
            $file = $request->file('file_upload');
            $path = $file->store('airlines', 'public');
            $data['image'] = $path;
        }
        $airline->update($data);
        toastr()->success('Data has been updated successfully!');
        return redirect()->route('airlines.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Airline $airline)
    {

        $image = 'storage/'.$airline->image;

        if (File::exists($image)) {
            File::delete($image);
        }
        $airline->delete();

        toastr()->success('Data has been deleted successfully!');
        return back();
    }
}
