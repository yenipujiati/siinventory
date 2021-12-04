@extends('superadmin/layout/main')
@section('content')

    <div class="row">
        <div class="col-lg-5">

            <h4>Daftar Produk</h4>
            <table class="table table-striped table-hover" id="productTable">
                @csrf
                <thead style="background: #2d2e33">
                <tr>

                    <th scope="col">Id</th>
                    <th scope="col">Produk</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>

                @foreach($barang_masuk as $row)
{{--                    @foreach($price as $row)--}}
                    <tr>
                        <td class="barang_masuk_id">{{$row->id}}</td>
                        <td class="barang_masuk_name">{{$row->name}}</td>
                        <td class="barang_masuk_harga">{{$row->harga}}</td>
                        <td>
                            <a href="#" class="addToCart">Tambah</a>
                        </td>
                    </tr>

{{--                    @endforeach--}}
                @endforeach
                </tbody>
            </table>

        </div>
        <div class="col-lg-7">
            <form action="" method="post">
                <h4>Pembeli</h4>

                <div class="form-group">
                    <select name="costomer_id" class="form-control">
                        @foreach($costomer as $row)
                            <option value="{{$row->id}}">{{$row->name}}</option>
                        @endforeach
                    </select>
                </div>
                &nbsp
                <h4>Daftar Belanja</h4>

                <table class="table table-striped table-hover" id="myTable">
                    @csrf
                    <thead style="background: #2d2e33">
                    <tr>

                        <th scope="col">Produk</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Qty</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>

                <input type="submit" value="Simpan Transaksi"></input>

            </form>

        </div>
    </div>
    <script>
        $(function () {
            $(".hidden").hide();

            var barang_masuk_id = "";
            var barang_masuk_name = "";
            var barang_masuk_harga = "";

            $("#productTable").on("click",".addToCart",function () {
                barang_masuk_id = $(this).closest('tr').find('.barang_masuk_id').text();
                barang_masuk_name = $(this).closest('tr').find('.barang_masuk_name').text();
                barang_masuk_harga = $(this).closest('tr').find('.barang_masuk_harga').text();

                var rowCount = $('#myTable tbody tr').length;

                var markup = "<tr>";
                markup += "<td>"+barang_masuk_name+"</td>";
                markup += "<td>"+barang_masuk_harga+"</td>";
                markup += "<td><input type='number' name='send["+(rowCount+1)+"][item]' value='1'></td>";
                markup += "<td><button type='button'><i class='fa fa-trash'</i></button></td>";
                markup += "</tr>";

                $('#myTable tbody').append(markup);
            });
        });
    </script>
@endsection
