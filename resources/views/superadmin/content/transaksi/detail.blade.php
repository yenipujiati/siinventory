@extends('superadmin/layout/main')
@section('content')
@php
    $total = 0;
@endphp

    <label>Tanggal: {{$transaksi->date}}</label><br>
    <label>Pembeli: {{$transaksi->name}}</label>
    <p></p>

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">

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

        </tbody>


    </table>

        <td>
            <label>Total Bayar: {{\App\Util\Helper::rupiahConverter($total)}}</label></br>
            <a href="{{route('admin.transaksi.index')}}"><i class="fa fa-arrow-circle-left"></i>Kembali</a>
        </td>

@endsection
