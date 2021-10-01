@extends('superadmin/layout/main')
@section('content')


    <a href="{{route('superadmin.pengguna.add')}}"class ="btn btn-sm btn-primary">Tambah Data </a>
    <table class="table table-striped table-hover">

        @csrf
        <thead style="background: #2d2e33">
        <tr>

            <th scope="col">Nama</th>
            <th scope="col">Role</th>
            <th scope="col">Email</th>
            <th scope="col">Status</th>
            <th scope="col">Aksi</th>
        </tr>
        </thead>
        <tbody>

        @foreach($pengguna as $row)
    <tr>
        <td>{{$row->name}}</td>
        <td>{{$row->role}}</td>
        <td>{{$row->email}}</td>
        <td>{{Helper::active($row->status)}}</td>
        <td>
            <a href=""> Edit</a>
            <a href=""> Hapus</a>
        </td>
    </tr>


        @endforeach
           </tbody>
    </table>

@endsection
