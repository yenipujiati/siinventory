@extends('superadmin/layout/main')
@section('content')

<body class="bg-gradient-primary">
    <div class="row justify-content-center">
        <div class="col-xl-5 col-lg-12 col-md-9">
             <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">                        
                    <div class="col-lg-100">
                        <div class="p-4">
                                    
                            <form action="{{route('superadmin.suplier.update', $suplier->id)}}" method="post" enctype ="multipart/form-data" >
                                @csrf
                        
                                <div class="form-group">
                                    <label >Name</label>
                                    <input type="text" name="name" value="{{$suplier->name}}" class ="form-control" placeholder="Name" required>
                                </div>
                        
                                <div class="form-group">
                                    <label >Email</label>
                                    <input type="email" name="email" value="{{$suplier->email}}" class="form-control" placeholder="Email" required>
                                </div>
                        
                                <div class="form-group">
                                    <label >Phone Number</label>
                                    <input type="text" name="phone_number" value="{{$suplier->phone_number}}" class="form-control" placeholder="Phone Number" required>
                                </div>
                        
                                <div class="form-group">
                                    <label >Address</label>
                                    <input type="text" name="address" value="{{$suplier->address}}" class="form-control" placeholder="Address" required>
                                </div>
                        
                                <div class="form-group">
                                    <label >Industry</label>
                                    <input type="text" name="industry" value="{{$suplier->industry}}" class="form-control" placeholder="Industry Name" required>
                                </div>
                        
                                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                                    <input type="submit" value="Simpan" class="btn-sm btn-primary">
                                    <a href="{{route('superadmin.suplier.index')}}"class ="btn btn-sm btn-danger" ><i class="fas fa-back"></i>Batal</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
@endsection
