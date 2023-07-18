@extends('admin.main')
@section('content')
<form action="{{ route('airlines.update', $airline)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <img src="{{ asset('storage/'.$airline->image) }}" width="100px" class="rounded-circle" alt="...">
    <div class="mb-3">
        <label for="formFileMultiple" class="form-label">Image</label>
        <input class="form-control" type="file" id="formFileMultiple"  value="{{$airline->image}}" name="file_upload">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Name</label>
        <input type="text"  class="form-control" value="{{$airline->name}}" name="name">
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
</form>
@endsection
@section('footer')
{!! JsValidator::formRequest('App\Http\Requests\UpdateAirlineRequest') !!}
@endsection