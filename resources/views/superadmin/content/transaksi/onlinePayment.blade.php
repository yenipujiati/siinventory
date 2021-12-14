@extends('superadmin/layout/main')
@section('content')

        @csrf
        <thead style="background: #2d2e33">
        <h1>PEMESANAN BERHASIL</h1>
        </thead>
        <tbody>

            <td>
                <h3>Silahkan melakukan pembayaran pada No.Rek 006-00-1710201-7</h3>
                <a href="{{route('superadmin.transaksi.index')}}"><i class="fa fa-arrow-circle-left"></i>Kembali</a>
            </td>

        </tbody>

@endsection
