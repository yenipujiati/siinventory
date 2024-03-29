@extends('superadmin/layout/main')
@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <a href="{{route('superadmin.barang_masuk.add')}}"class ="btn btn-sm btn-primary" ><i class="fas fa-plus-square"></i> Add</a>
    <a href="{{route('superadmin.barang_masuk.cetak')}}" target="blank" class ="btn btn-sm btn-danger"><i class="fa fa-print"></i> Cetak PDF </a>
</div>

    <table class="table table-striped table-hover">
        @csrf
        <thead style="background: #2d2e33">

            <tr>
                <th scope="col">Nama</th>
                <th scope="col">Stock</th>
                <th scope="col">Harga</th>
                <th scope="col">Suplier</th>
                <th scope="col">Action</th>
            </tr>
        </thead>

        <tbody>
        @foreach($barang_masuk as $row)
            <tr>
                <td>{{$row->name}}</td>
                <td>{{$row->stock}}</td>
                <td>{{$row->harga}}</td>
                <td>{{$row->penyuplai}}</td>
                <td>
                    <a href= "{{route('superadmin.barang_masuk.edit',$row->id)}}" data-toogle="tooltip" data-placement="top" title="Edit" class ="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                    <a onclick = "return confirm ('Hapus Data?')" href="{{route('superadmin.barang_masuk.delete',$row->id)}}" data-toogle="tooltip" data-placement="top" title="Hapus" class ="btn btn-sm btn-warning"><i class="fa fa-trash"></i></a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
        {{$barang_masuk->links()}}
@endsection
