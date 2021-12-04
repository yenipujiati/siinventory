@extends('superadmin/layout/main')
@section('content')

    <form action="{{route('superadmin.pengguna.store')}}" method="post" enctype ="multipart/form-data" >
        @csrf

        <div class="form-group">
            <label >Nama</label>
            <input type="text" name="name" class ="form-control" placeholder="Nama" required>
        </div>

        <div class="form-group">
            <label >Email</label>
            <input type="email" name="email" class="form-control" placeholder="Email" required>
        </div>

        <div class="form-group">
            <label >Role </label>
            <select name="role" class="form-control" required >
                <option value="admin">Admin</option>
                <option value="superadmin">Supper Admin</option>
            </select>
        </div>

        <div class="form-group">
            <label>Avatar</label>
            <input type="file" name="image" accept="image/png, image/jpeg, image/jpg" class="form-control">
        </div>


      <input type="submit" value="Simpan" class="btn-sm btn-primary">
      <a href="{{route('superadmin.pengguna.index')}}"class ="btn btn-sm btn-danger" ><i class="fas fa-back"></i>Batal</a>
        </div>

    </form>
@endsection
