@extends('superadmin/layout/main')
@section('content')

    <form action="{{route('superadmin.pengguna.store')}}" method="post" >
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
            <select type="role" class="form-control" required >
                <option value="admin">Admin</option>
                <option value="superadmin">Supper Admin</option>
        </select>
            {{--tambah data--}}
        </div>
        <div class="form-group">
      <input type="submit" value="Simpan" class="btn-sm btn-primary">

        </div>

    </form>
@endsection
