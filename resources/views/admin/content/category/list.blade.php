@extends('admin/layout/main')
@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <a href="{{route('admin.category.add')}}"class ="btn btn-sm btn-primary btn-flat">Add</a>
</div>

<div class="box-body table-responsive">
    <table class="table table-striped table-striped">
        @csrf
        <thead style="background: #47474b">
            <tr>
                <th scope="col">Nama</th>
                <th scope="col">Action</th>
            </tr>
            </thead>

            <tbody>

            @foreach($category as $row)
            <tr>
                <td>{{$row->name}}</td>
                <td style="width:20%">
                    <a href= "{{route('admin.category.edit',$row->id)}}" data-toogle="tooltip" data-placement="top" title="Edit" class ="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                    <a onclick = "return confirm ('Hapus Data?')" href="{{route('admin.category.delete',$row->id)}}" data-toogle="tooltip" data-placement="top" title="Hapus" class ="btn btn-sm btn-warning"><i class="fa fa-trash"></i></a>
                </td>
            </tr>

        @endforeach
        </tbody>
    </table>
</div>
@endsection
