
@php
    $total = 0;
@endphp

<label>TRANSAKSI ID: {{$transaksi->id}}</label><br>
<label>TANGGAL: {{$transaksi->date}}</label><br>
<label>CUSTOMER: {{$transaksi->name}}</label>
<p></p>

<table border="1" style="width: 100%; border-collapse: collapse;">

    <thead style="background: #2d2e33">
    <tr>
        <th>No</th>
        <th>Produk</th>
        <th>Harga</th>
        <th>Jumlah</th>
        <th>SubTotal</th>
    </tr>
    </thead>
    <tbody>

    @php
        $no = 1;
    @endphp

    @foreach($item as $row)

        @php
            $total += $row->price;
        @endphp

        <tr>
            <td>{{$no++}}</td>
            <td>{{$row->product_name}}</td>
            <td>{{\App\Util\Helper::rupiahConverter($row->product_price)}}</td>
            <td>{{$row->qty}}</td>
            <td>{{\App\Util\Helper::rupiahConverter($row->price)}}</td>

        </tr>
        {{--                <td>--}}
        {{--                    <label>Total Bayar: {{\App\Util\Helper::rupiahConverter($total)}}</label></br>--}}
        {{--                </td>--}}

    @endforeach

    </tbody>


</table>
<p></p>
<label>Total Bayar: {{\App\Util\Helper::rupiahConverter($total)}}</label></br>
