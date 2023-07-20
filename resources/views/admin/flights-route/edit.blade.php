@extends('admin.main')
@section('content')
    <div class="container">
        <h3 class="mt-3 mb-3 text-center">
            Edit of flight route
        </h3>
        <form action="{{ route('flight-route.update', $flightRoute)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="" class="form-label">Place Start:</label>
                <select class="form-select" aria-label="Default select example" name="place_start">
                    <option value="" hidden>Open place start</option>
                    @foreach(\App\Models\FlightRoute::$place as $place)
                        <option value="{{ $place }}"
                            @if ($place == old('place_start', $flightRoute->place_start))
                                selected="selected"
                            @endif
                        >
                            {{ $place }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Place End:</label>
                <select class="form-select" aria-label="Default select example" name="place_end">
                    <option value="" hidden>Open place end</option>
                    @foreach(\App\Models\FlightRoute::$place as $place)
                        <option value="{{ $place }}"
                            @if ($place == old('place_end', $flightRoute->place_end))
                                selected="selected"
                            @endif
                        >
                            {{ $place }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="d-flex align-items-center">
                <div>
                    <button type="submit" class="btn btn-primary" id="create_airline">Cập nhật</button>
                </div>
                <div>
                    <a href="{{ route('flight-route.index')}}" class="btn btn-danger ms-3">Quay lại</a>
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
    {!! JsValidator::formRequest('App\Http\Requests\StoreFlightRouteRequest') !!}
@endsection
