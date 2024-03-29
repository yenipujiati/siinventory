@extends('admin/layout/main')
@section('content')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <a href="{{route('admin.pengguna.cetak')}}" target="blank" class ="btn btn-sm btn-danger"><i class="fa fa-print"></i> Cetak PDF </a>
</div>
   
    <table class="table table-striped table-hover">

        @csrf
        <thead style="background: #2d2e33">
        <tr>

        <th scope="col">Nama</th>
        <th scope="col">Role</th>
        <th scope="col">Email</th>
        <th scope="col">Status</th>
        <th scope="col">Avatar</th>
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
       
    </tr>


        @endforeach
           </tbody>
    </table>

@endsection

