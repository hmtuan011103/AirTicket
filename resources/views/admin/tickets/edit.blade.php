@extends('admin.main')
@section('content')
    <div class="container">
        <h3 class="mt-3 mb-3 text-center">
            Add of plane
        </h3>
        <form action="{{ route('planes.update', $plane)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="" class="form-label">Name:</label>
                <input type="text"  class="form-control" name="name" value="{{ $plane->name }}">
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Seat total:</label>
                <input type="number"  class="form-control" name="seat_total" value="{{ $plane->seat_total }}">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Airline:</label>
                <select class="form-select" aria-label="Default select example" name="airline_id">
                    <option value="" hidden>List of airlines</option>
                    @foreach($airlines as $airline)
                        <option value="{{ $airline->id }}" {{ $airline->id === $plane->airline_id ? 'selected' : '' }}
                        >
                            {{ $airline->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="d-flex align-items-center">
                <div>
                    <button type="submit" class="btn btn-primary" id="create_airline">Cập nhật</button>
                </div>
                <div>
                    <a href="{{ route('planes.index')}}" class="btn btn-danger ms-3">Quay lại</a>
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
    {!! JsValidator::formRequest('App\Http\Requests\UpdatePlaneRequest') !!}
@endsection
