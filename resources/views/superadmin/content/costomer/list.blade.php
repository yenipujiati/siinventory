@extends('superadmin/layout/main')
@section('content')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <a href="{{route('superadmin.costomer.add')}}"class ="btn btn-sm btn-primary">Tambah Costomer</a>
    <a href="{{route('superadmin.costomer.cetak')}}" target="blank" class ="btn btn-sm btn-danger"><i class="fa fa-print"></i> Cetak PDF </a>

</div>
    

    <table class="table table-striped table-hover">
        @csrf
        <thead style="background: #2d2e33">
        <tr>

            <th scope="col">Nama</th>
            <th scope="col">Alamat</th>
            <th scope="col">Phone Number</th>
            <th scope="col">Email</th>
            <th scope="col">Action</th>

        </tr>
        </thead>
        <tbody>

        @foreach($costomer as $row)
            <tr>
                <td>{{$row->name}}</td>
                <td>{{$row->alamat}}</td>
                <td>{{$row->nomber}}</td>
                <td>{{$row->email}}</td>
                <td>
                    <a href= "{{route('superadmin.costomer.edit',$row->id)}}" data-toogle="tooltip" data-placement="top" title="Edit" class ="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                    <a onclick = "return confirm ('Hapus Data?')" href="{{route('superadmin.costomer.delete',$row->id)}}" data-toogle="tooltip" data-placement="top" title="Hapus" class ="btn btn-sm btn-warning"><i class="fa fa-trash"></i></a>
                </td>

            </tr>


        @endforeach
        </tbody>
    </table>

@endsection
