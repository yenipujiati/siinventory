@extends('superadmin/layout/main')
@section('content')
@php
    $total = 0;
@endphp
  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <label>Tanggal: {{$transaksi->date}}</label><br>
    <label>Pembeli: {{$transaksi->name}}</label>
  </div>



    <table class="table table-striped table-hover">

        @csrf
        <thead style="background: #2d2e33">
        <tr>

            <th scope="col">Barang</th>
            <th scope="col">Harga</th>
            <th scope="col">Jumlah</th>
            <th scope="col">SubTotal</th>
        </tr>
        </thead>
        <tbody>

        @foreach($item as $row)

            @php
                $total += $row->price;
            @endphp

            <tr>
                <td>{{$row->product_name}}</td>
                <td>{{\App\Util\Helper::rupiahConverter($row->product_price)}}</td>
                <td>{{$row->qty}}</td>
                <td>{{\App\Util\Helper::rupiahConverter($row->price)}}</td>

            </tr>


        @endforeach
        <td>
            <label>Total Bayar: {{\App\Util\Helper::rupiahConverter($total)}}</label></br>
            <a href="{{route('superadmin.transaksi.index')}}"><i class="fa fa-arrow-circle-left"></i>Kembali</a>
        </td>
        </tbody>


    </table>



@endsection
