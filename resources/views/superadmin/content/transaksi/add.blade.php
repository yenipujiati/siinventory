@extends('superadmin/layout/main')
@section('content')
<h3>Tambah Transaksi Baru</h3>
<p></p>
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

                @foreach($product as $row)
{{--                    @foreach($price as $row)--}}
                    <tr>
                        <td class="product_id">{{$row->id}}</td>
                        <td class="product_name">{{$row->name}}</td>
                        <td class="product_price">{{$row->price}}</td>
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
            <form action="{{route('superadmin.transaksi.store')}}" method="post">
                @csrf
                <h4>Pembeli</h4>

                <div class="form-group">
                    <select name="costomer_id" class="form-control">
                        @foreach($costomer as $row)
                            <option value="{{$row->id}}">{{$row->name}}</option>
                        @endforeach
                    </select>
                </div>
                <br>
                <h4>Admin</h4>

                <div class="form-group">
                    <select name="admin_id" class="form-control">
                        @foreach($admin as $row)
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
            delInit();
            $(".hidden").hide();

            var product_id = "";
            var product_name = "";
            var product_price = "";

            $("#productTable").on("click",".addToCart",function () {
                product_id = $(this).closest('tr').find('.product_id').text();
                product_name = $(this).closest('tr').find('.product_name').text();
                product_price = $(this).closest('tr').find('.product_price').text();

                var rowCount = $('#myTable tbody tr').length;

                var markup = "<tr>";
                markup += "<td>"+product_name+"</td>";
                markup += "<td>"+product_price+"</td>";

                markup += "<td>";
                markup += "<input type='number' name='send["+(rowCount+1)+"][product_qty]' value='1'>";
                markup += "<input type='hidden' name='send["+(rowCount+1)+"][product_id]' value="+product_id+">";
                markup += "</td>";

                markup += "<td><button type='button' class='delete-row'>Hapus</button></td>";
                markup += "</tr>";

                $('#myTable tbody').append(markup);
                delInit();
            });

            function delInit() {
                $(".delete-row").click(function () {
                   $(this).parent().parent().remove();
                });
            }
        });
    </script>
@endsection
