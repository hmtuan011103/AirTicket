<?php

namespace App\Http\Controllers;

use App\Http\Requests\FoundFlightRequest;
use App\Models\Flight;
use Illuminate\Http\Request;

class FoundFlightController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('client.home');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FoundFlightRequest $request)
    {
        $filters = $request->post();
        return view('client.flight', [
            'flights' => Flight::with(['flightRoute','plane','flightDetails','tickets'])
                ->latest()->filter($filters)->get()
        ]);
    }
}
