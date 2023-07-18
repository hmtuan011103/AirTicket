@extends('admin.main')
@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="{{ route('airlines.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label for="formFileMultiple" class="form-label">Image</label>
        <input class="form-control @error('file_upload') is-invalid @enderror" type="file" id="formFileMultiple" name="file_upload">
        @error('file_upload')
            <div class="alert text-danger mt-3"
            style="color: red"
            >{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Name</label>
        <input type="text"  class="form-control @error('name') is-invalid @enderror" name="name">
        @error('name')
            <div class="alert text-danger mt-3">{{ $message }}</div>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary" id="create_airline">Tải lên</button>
</form>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
@endsection
@section('header')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
@endsection
@section('footer')
{!! JsValidator::formRequest('App\Http\Requests\StoreAirlineRequest') !!}
@endsection