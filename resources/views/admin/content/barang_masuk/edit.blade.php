@extends('admin/layout/main')
@section('content')

<body class="bg-gradient-primary">
        <div class="row justify-content-center">
            <div class="col-xl-5 col-lg-12 col-md-9">
                 <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">                        
                        <div class="col-lg-100">
                            <div class="p-4">
                                        
                                <form action="{{route('admin.barang_masuk.update', $barang_masuk->id)}}" method="post">
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
                            
                            
                                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                                        <input type="hidden" name="id" value{{$barang_masuk->id}}>
                                        <input type="submit" value="Simpan" class="btn-sm btn-primary">
                                        <a href="{{route('admin.barang_masuk.index')}}"class ="btn btn-sm btn-danger" ><i class="fas fa-back"></i>Batal</a>                                                                   
                                    </div>
                            
                                </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
    @endsection
