@extends('superadmin/layout/main')
@section('content')

 <!-- Page Heading -->
 <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <a href="{{route('superadmin.transaksi.add')}}"class ="btn btn-sm btn-primary">Tambah Transaksi</a>
</div>

    <table class="table table-striped table-hover">
        @csrf
        <thead style="background: #2d2e33">
        <tr>

        <th scope="col">Tanggal</th>
        <th scope="col">Pembeli</th>
        <th scope="col">Staff</th>
        <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>

        @foreach($transaksi as $row)
    <tr>
        <td>{{$row->date}}</td>
        <td>{{$row->name}}</td>
        <td>{{$row->admin_name}}</td>
        <td>
            <a href= "{{route('superadmin.transaksi.detail',$row->id)}}" data-toogle="tooltip" data-placement="top" title="View Detail"><i class="fa fa-eye"></i></a>
            <a href= "{{route('superadmin.transaksi.cetak',$row->id)}}" data-toogle="tooltip" data-placement="top" title="PrintPDF"><i class="fa fa-print"></i></a>
            </td>
    </tr>


        @endforeach
           </tbody>
    </table>

@endsection
