@extends('admin/layout/main')
@section('content')


    <table class="table table-striped table-hover">

        @csrf
        <thead style="background: #2d2e33">
            <tr>

                <th scope="col">Nama</th>
                <th scope="col">Email</th>
                <th scope="col">Phone Number</th>
                <th scope="col">Address</th>
                <th scope="col">Industry</th>
            </tr>
        </thead>

        <tbody>

        @foreach($suplier as $row)
            <tr>
                <td>{{$row->name}}</td>
                <td>{{$row->email}}</td>
                <td>{{$row->phone_number}}</td>
                <td>{{$row->address}}</td>
                <td>{{$row->industry}}</td>
            </tr>


        @endforeach
        </tbody>
    </table>

@endsection
