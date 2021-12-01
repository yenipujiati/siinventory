@extends('superadmin/layout/main')
@section('content')

    <form action="{{route('superadmin.costomer.store')}}" method="post" enctype ="multipart/form-data" >
        @csrf



        <div class="form-group">
            <label >Name</label>
            <input type="text" name="name" class ="form-control" placeholder="name" required>
        </div>

        <div class="form-group">
            <label >Alamat</label>
            <input type="text" name="alamat" class ="form-control" placeholder="alamat " required>
        </div>

        <div class="form-group">
            <label >Phone Number</label>
            <input type="text" name="nomber" class="form-control" placeholder="phone Number" required>
        </div>

        <div class="form-group">
            <label >Email</label>
            <input type="email" name="email" class="form-control" placeholder="Email" required>
        </div>



        <input type="submit" value="Simpan" class="btn-sm btn-primary">

        </div>

    </form>

@endsection
