@extends('admin.main')
@section('content')
    <div class="container">
        <h3 class="mt-3 mb-3 text-center">
            Add of flight
        </h3>
        <form action="{{ route('flights.store')}}" method="POST" class="row">
            @csrf
            <div class="col-6">
                <div class="mb-3">
                    <label for="" class="form-label">Plane Name:</label>
                    <select class="form-select" aria-label="Default select example" name="plane_id">
                        <option value="" hidden></option>
                        @foreach($planes as $plane)
                            <option value="{{ $plane->id }}">
                                {{ $plane->name .
                                ' (' . $plane->airline->name . ' --- ' . $plane->seat_total . ') '}}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Class Business:</label>
                    <input type="number"  class="form-control" name="class_business">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Class Economy:</label>
                    <input type="number" min="0" class="form-control" name="class_economy">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Break Time (Minutes):</label>
                    <input type="number" min="0" class="form-control" name="break_time">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Intermediate Airport:</label>
                    <select class="form-select" aria-label="Default select example" name="intermediate_airport">
                        <option value="" hidden></option>
                        @foreach(\App\Models\FlightRoute::$place as $place)
                            <option value="{{ $place }}">{{ $place }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-6">
                <div class="mb-3">
                    <label for="" class="form-label">Flight Date:</label>
                    <input type="date"  class="form-control" name="flight_date">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Flight Route Name:</label>
                    <select class="form-select" aria-label="Default select example" name="flight_route_id">
                        <option value="" hidden></option>
                        @foreach($flightRoutes as $flightRoute)
                            <option value="{{ $flightRoute->id }}">{{ $flightRoute->place_start . ' -----> '. $flightRoute->place_end}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="row mb-3">
                    <div class="col-6">
                        <label for="" class="form-label">Flight Time Start (Hour):</label>
                        <select class="form-select" aria-label="Default select example" name="flight_time_start_hour">
                            <option value="" hidden></option>
                            @for($i = 0; $i < 24; $i++)
                                <option value="{{ $i }}">{{ $i.'h' }}</option>
                            @endfor
                        </select>
                    </div>
                    <div class="col-6">
                        <label for="" class="form-label">Flight Time Start (Minutes):</label>
                        <select class="form-select" aria-label="Default select example" name="flight_time_start_minutes">
                            <option value="" hidden></option>
                            @for($i = 5; $i < 56; $i+=5)
                                <option value="{{ $i }}">{{ $i.'p' }}</option>
                            @endfor
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-6">
                        <label for="" class="form-label">Flight Time Total (Hour):</label>
                        <select class="form-select" aria-label="Default select example" name="flight_time_total_hour">
                            <option value="" hidden></option>
                            @for($i = 1; $i < 24; $i++)
                                <option value="{{ $i }}">{{ $i.'h' }}</option>
                            @endfor
                        </select>
                    </div>
                    <div class="col-6">
                        <label for="" class="form-label">Flight Time Total (Minutes):</label>
                        <select class="form-select" aria-label="Default select example" name="flight_time_total_minutes">
                            <option value="" hidden></option>
                            @for($i = 5; $i < 56; $i+=5)
                                <option value="{{ $i }}">{{ $i.'p' }}</option>
                            @endfor
                        </select>
                    </div>
                </div>
            </div>

            <div class="col-12 d-flex align-items-center">
                <div>
                    <button type="submit" class="btn btn-primary" id="create_airline">Tải lên</button>
                </div>
                <div>
                    <a href="{{ route('flights.index')}}" class="btn btn-danger ms-3">Quay lại</a>
                </div>
            </div>
        </form>
    </div>
@endsection
@section('header')
    <style>
        .help-block{
            color: red !important;
            font-size: 13px !important;
            margin-top: 10px !important;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
@endsection
@section('footer')
    <!-- Javascript Requirements -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
    <!-- Laravel Javascript Validation -->
    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
    {!! JsValidator::formRequest('App\Http\Requests\StoreFlightRequest') !!}
@endsection
