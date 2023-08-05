@extends('admin.main')
@section('content')
    <div class="container">
        <h3 class="mt-3 mb-3 text-center">
            Add of Ticket
        </h3>
        <form action="{{ route('tickets.store')}}" method="POST">
            @csrf
            <div class="row">
                <div class="col-6 mb-3">
                    <label for="" class="form-label">Flight:</label>
                    <select class="form-select" aria-label="Default select example" name="flight_id">
                        <option value="" hidden>List of airlines</option>
                        @foreach($flights as $flight)
                            <option value="{{ $flight->id }}">
                                {{ $flight->plane->name . ' (' . $flight->plane->airline->name . ')'.
                                ' (' . 'B-' .$flight->class_business . ')' . ' (' . 'E-' .$flight->class_economy . ')' }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-6 mb-3">
                    <label for="" class="form-label">Class:</label>
                    <select class="form-select" aria-label="Default select example" name="class">
                        <option value="" hidden>Type of ticket</option>
                        <option value="1">Class Business</option>
                        <option value="2">Class Economy</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-6 mb-3">
                    <label for="" class="form-label">Quantity:</label>
                    <input class="form-control" type="number" name="quantity" min="0">
                </div>
                <div class="col-6 mb-3">
                    <label for="" class="form-label">Price:</label>
                    <input class="form-control" type="number" name="price" min="0">
                </div>
            </div>

{{--            <div class="mb-3">--}}
{{--                <label for="" class="form-label">Type:</label>--}}
{{--                <select class="form-select" aria-label="Default select example" name="type_discount">--}}
{{--                    <option value="" hidden>Type of ticket</option>--}}
{{--                    <option value="1">Giảm giá theo %</option>--}}
{{--                    <option value="2">Giảm giá theo tiền</option>--}}
{{--                </select>--}}
{{--            </div>--}}

            <div class="d-flex align-items-center">
                <div>
                    <button type="submit" class="btn btn-primary" id="create_airline">Tải lên</button>
                </div>
                <div>
                    <a href="{{ route('tickets.index')}}" class="btn btn-danger ms-3">Quay lại</a>
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
    <script>

    </script>
    <!-- Javascript Requirements -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
    <!-- Laravel Javascript Validation -->
    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
    {!! JsValidator::formRequest('App\Http\Requests\StoreTicketRequest') !!}
@endsection
