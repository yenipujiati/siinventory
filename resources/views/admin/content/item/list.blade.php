@extends('admin/layout/main')
@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <a href="{{route('admin.item.add')}}"class ="btn btn-sm btn-primary">Tambah Item</a>
</div>

<div class="box-body table-responsive">
    <table class="table table-striped table-striped" >
        @csrf
        <thead style="background: #47474b">
            <tr>
                <th scope="col">Barcode</th>
                <th scope="col">Nama</th>
                <th scope="col">Kategori</th> 
                <th scope="col">Unit</th> 
                <th scope="col">Price</th>
                <th scope="col">Stock</th>
                <th scope="col">Action</th>
            </tr>
            </thead>

            <tbody>

            @foreach($item as $row)
            <tr>
                <td>{{$row->barcode}}</td>
                <td>{{$row->name}}</td>
                <td>{{$row->category_id}}</td>    
                <td>{{$row->unit_id}}</td>             
                <td>{{$row->price}}</td>
                <td>{{$row->stock}}</td>
                <td>
                    <a href= "{{route('admin.item.edit',$row->id)}}" data-toogle="tooltip" data-placement="top" title="Edit" class ="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                    <a onclick = "return confirm ('Hapus Data?')" href="{{route('admin.item.delete',$row->id)}}" data-toogle="tooltip" data-placement="top" title="Hapus" class ="btn btn-sm btn-warning"><i class="fa fa-trash"></i></a>
                </td>
            </tr>

        @endforeach
        </tbody>
    </table>
</div>
@endsection
