@extends('superadmin/layout/main')
@section('content')


    <a href="{{route('superadmin.pengguna.add')}}"class ="btn btn-sm btn-primary">Tambah Data </a>
    <a href="{{route('superadmin.pengguna.export')}}"class ="btn btn-sm btn-success"><i class="fa fa-file-excel"></i> Download Excel </a>

    <table class="table table-striped table-hover">

        @csrf
        <thead style="background: #2d2e33">
        <tr>

        <th scope="col">Nama</th>
        <th scope="col">Role</th>
        <th scope="col">Email</th>
        <th scope="col">Status</th>
        <th scope="col">Avatar</th>
        <th scope="col">Action</th>
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
            <a href ="{{route('storage_file',$row->image)}}" target="_blank">Lihat Foto</a>
        </td>
        <td>
            <a href= "{{route('superadmin.pengguna.edit',$row->id)}}" data-toogle="tooltip" data-placement="top" title="Edit" class ="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
            <a onclick = "return confirm ('Hapus Data?')" href="{{route('superadmin.pengguna.delete',$row->id)}}" data-toogle="tooltip" data-placement="top" title="Hapus" class ="btn btn-sm btn-warning"><i class="fa fa-trash"></i></a>
            <a href="{{route('download_file',$row->image)}}" data-toogle="tooltip" data-placement="top" title="Download" class ="btn btn-sm btn-danger"><i class="fa fa-download"></i></a>
        </td>
    </tr>


        @endforeach
           </tbody>
    </table>

@endsection
