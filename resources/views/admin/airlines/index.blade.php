@extends('admin.main')
@section('header')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap5.min.css">
@endsection
@section('content')
<h1>
    <a href="{{ route('airlines.create')}}" class="btn btn-primary">Add Airline</a>
</h1>
<table id="airlines" class="table table-striped pe-2  ps-2" style="width:100%; font-size:14px">
    <thead>
        <tr>
            <th>Name</th>
            <th>Image</th>
            <th>Create date</th>
            <th>Action</th>
        </tr>
    </thead>
    @foreach($data as $item)
    <tbody>
        <tr>
            <td>{{$item->name}}</td>
            <td><img class="rounded-circle" width="100px" src="{{asset('storage/'.$item->image)}}" alt=""></td>
            <td>{{$item->created_at}}</td>
            <td>
                <a class="btn btn-success" href="{{ route('airlines.edit',$item)}}">Edit</a>
                <button class="btn btn-danger" onclick="document.getElementById('item-{{$item->id}}').submit();">Delete</button>
                <form action="{{ route('airlines.destroy',$item)}}" id="item-{{$item->id}}" method="post">
                    @csrf
                    @method('delete')
                </form>
            </td>
        </tr>
    </tbody>
    @endforeach
    
</table>
@endsection
@section('footer')
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js"></script>
<script>
    new DataTable('#airlines');
</script>
@endsection
