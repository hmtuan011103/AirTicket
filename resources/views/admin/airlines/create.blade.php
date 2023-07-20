@extends('admin.main')
@section('content')
    <div class="container">
        <h3 class="mt-3 mb-3 text-center">
            Add of airlines
        </h3>
        <form action="{{ route('airlines.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="formFileMultiple" class="form-label">Image:</label>
                <input class="form-control @error('file_upload') is-invalid @enderror" type="file" id="formFileMultiple" name="file_upload">
                @error('file_upload')
                <div class="alert text-danger mt-3"
                     style="color: red"
                >{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Name:</label>
                <input type="text"  class="form-control @error('name') is-invalid @enderror" name="name">
                @error('name')
                <div class="alert text-danger mt-3">{{ $message }}</div>
                @enderror
            </div>
            <div class="d-flex align-items-center">
                <div>
                    <button type="submit" class="btn btn-primary" id="create_airline">Tải lên</button>
                </div>
                <div>
                    <a href="{{ route('airlines.index')}}" class="btn btn-danger ms-3">Quay lại</a>
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
    {!! JsValidator::formRequest('App\Http\Requests\StoreAirlineRequest') !!}
@endsection
