@extends('admin/layout/main')
@section('content')

    <form action="{{route('admin.barang_masuk.store')}}" method="post" enctype ="multipart/form-data" >
        @csrf

        <div class="form-group">
            <label >Name</label>
            <input type="text" name="name" class ="form-control" placeholder="Name" required>
        </div>

        <div class="form-group">
            <label >Stock</label>
            <input type="number" name="stock" class="form-control" placeholder="Stock" required>
        </div>

        <div class="form-group">
            <label >Harga</label>
            <input type="number" name="harga" class="form-control" placeholder="Harga" required>
        </div>

        <div class="form-group">
            <label >Suplier</label>
            <select name="suplier_id" class="form-control">
                <option disabled selected>
                    Pilih Suplier
                </option>
                @foreach($penyuplai as $row)
                    <option value="{{$row->id}}">{{$row->name}}</option>
                @endforeach
            </select>
        </div>

      <input type="submit" value="Simpan" class="btn-sm btn-primary">

        </div>

    </form>
@endsection
