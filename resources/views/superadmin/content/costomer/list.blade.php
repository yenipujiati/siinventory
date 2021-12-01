@extends('superadmin/layout/main')
@section('content')


    <a href="{{route('superadmin.costomer.add')}}"class ="btn btn-sm btn-primary">Tambah Data</a>
    <table class="table table-striped table-hover">

        @csrf
        <thead style="background: #2d2e33">
        <tr>

            <th scope="col">Nama</th>
            <th scope="col">Alamat</th>
            <th scope="col">Phone Number</th>
            <th scope="col">Email</th>

        </tr>
        </thead>
        <tbody>

        @foreach($costomer as $row)
            <tr>
                <td>{{$row->name}}</td>
                <td>{{$row->alamat}}</td>
                <td>{{$row->nomber}}</td>
                <td>{{$row->email}}</td>


            </tr>


        @endforeach
        </tbody>
    </table>

@endsection
