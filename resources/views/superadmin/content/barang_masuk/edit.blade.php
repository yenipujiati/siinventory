@extends('superadmin/layout/main')
@section('content')

    <form action="{{route('superadmin.barang_masuk.update', $barang_masuk->id)}}" method="post">
        @csrf
        <div class="form-group">
            <label >Name</label>
            <input type="text" name="name" value="{{$barang_masuk->name}}" class ="form-control" placeholder="Name" required>
        </div>

        <div class="form-group">
            <label >Stock</label>
            <input type="number" name="stock" value="{{$barang_masuk->stock}}" class="form-control" placeholder="Stock" required>
        </div>

        <div class="form-group">
            <label >Harga</label>
            <input type="number" name="harga" value="{{$barang_masuk->harga}}" class="form-control" placeholder="Harga" required>
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


        <div class="form-group">
            <input type="hidden" name="id" value{{$barang_masuk->id}}">
            <input type="submit" value="Simpan" class="btn-sm btn-primary">

        </div>

    </form>
@endsection
