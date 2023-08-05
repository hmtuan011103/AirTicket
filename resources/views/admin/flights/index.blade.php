@extends('admin.main')
@section('header')
    <style>
        *{
            font-size: 14px;
        }
        #flights_filter{
            margin-right: 8px;
        }
        #flights_filter label{
            width: 100%;
            text-align: right;
        }
        #flights_filter input{
            width: 80%;
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap5.min.css">
@endsection
@section('content')
    <div class="container-fluid mt-5">
        <h3 class="mt-3 mb-3 text-center">
            List of flights
        </h3>
        <h1>
            <a href="{{ route('flights.create')}}" class="btn btn-primary mb-3">Add Flight</a>
        </h1>
        <table id="flights" class="table table-striped pe-2  ps-2" style="width:100%; font-size:14px">
            <thead>
            <tr>
                <th>Plane Name</th>
                <th>Class Business</th>
                <th>Class Economy</th>
                <th>Flight Time Total</th>
                <th>Flight Date</th>
                <th>Flight Time Start</th>
                <th>Flight Route</th>
                <th>Create Date</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($data as $item)
                <tr>
                    <td>{{$item->plane->name}}</td>
                    <td>{{$item->class_business}}</td>
                    <td>{{$item->class_economy}}</td>
                    <td>{{$item->flight_time_total}}</td>
                    <td>{{$item->flight_date}}</td>
                    <td>{{$item->flight_time_start}}</td>
                    <td>
                        {{$item->flightRoute->place_start}}
                        <p class="p-0 m-0 fs-6">---------------- đến ----------------</p>
                        {{ $item->flightRoute->place_end }}
                    </td>
                    <td>{{$item->created_at}}</td>
                    <td>
                        <a class="btn btn-primary" href="{{ route('flights.show',$item)}}">Detail</a>
                        <a class="btn btn-success" href="{{ route('flights.edit',$item)}}">Edit</a>
                        <button class="btn btn-danger" onclick="document.getElementById('item-{{$item->id}}').submit();">Delete</button>
                        <form action="{{ route('flights.destroy',$item)}}" id="item-{{$item->id}}" method="post">
                            @csrf
                            @method('delete')
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>

        </table>
    </div>
@endsection
@section('footer')
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js"></script>
    <script>
        new DataTable('#flights');
    </script>
@endsection
