@extends('superadmin/layout/main')
@section('content')

    

<body class="bg-gradient-primary">
    <div class="row justify-content-center">
        <div class="col-xl-5 col-lg-12 col-md-9">
             <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">                        
                    <div class="col-lg-100">
                        <div class="p-4">
                                    
                            <form action="{{route('superadmin.barang_masuk.store')}}" method="post" enctype ="multipart/form-data" >
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
                                        - Pilih -
                                        </option>
                                        @foreach($penyuplai as $row)
                                            <option value="{{$row->id}}">{{$row->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                
                            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                                <input type="submit" value="Simpan" class="btn-sm btn-primary">
                                <a href="{{route('superadmin.barang_masuk.index')}}"class ="btn btn-sm btn-danger" ><i class="fas fa-back"></i>Batal</a>
                            </div>
                                
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
@endsection
