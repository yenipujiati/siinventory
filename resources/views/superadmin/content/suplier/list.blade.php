@extends('superadmin/layout/main')
@section('content')


    <a href="{{route('superadmin.suplier.add')}}"class ="btn btn-sm btn-primary">Tambah Data</a>
    <table class="table table-striped table-hover">

        @csrf
        <thead style="background: #2d2e33">
        <tr>

        <th scope="col">Nama</th>
        <th scope="col">Email</th>
        <th scope="col">Phone Number</th>
        <th scope="col">Address</th>
        <th scope="col">Industry</th>
        <th scope="col">Action</th>
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
        <td>
            <a href= "{{route('superadmin.suplier.edit',$row->id)}}" data-toogle="tooltip" data-placement="top" title="Edit" class ="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
            <a onclick = "return confirm ('Hapus Data?')" href="{{route('superadmin.suplier.delete',$row->id)}}" data-toogle="tooltip" data-placement="top" title="Hapus" class ="btn btn-sm btn-warning"><i class="fa fa-trash"></i></a>
        </td>
    </tr>


        @endforeach
           </tbody>
    </table>

@endsection
