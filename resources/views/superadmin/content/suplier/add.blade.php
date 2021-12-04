@extends('superadmin/layout/main')
@section('content')

    <form action="{{route('superadmin.suplier.store')}}" method="post" enctype ="multipart/form-data" >
        @csrf

        <div class="form-group">
            <label >Name</label>
            <input type="text" name="name" class ="form-control" placeholder="Name" required>
        </div>

        <div class="form-group">
            <label >Email</label>
            <input type="email" name="email" class="form-control" placeholder="Email" required>
        </div>

        <div class="form-group">
            <label >Phone Number</label>
            <input type="text" name="phone_number" class="form-control" placeholder="Phone Number" required>
        </div>

        <div class="form-group">
            <label >Address</label>
            <input type="text" name="address" class="form-control" placeholder="Address" required>
        </div>

        <div class="form-group">
            <label >Industry</label>
            <input type="text" name="industry" class="form-control" placeholder="Industry Name" required>
        </div>


      <input type="submit" value="Simpan" class="btn-sm btn-primary">
      <a href="{{route('superadmin.suplier.index')}}"class ="btn btn-sm btn-danger" ><i class="fas fa-back"></i>Batal</a>

    </form>
@endsection
