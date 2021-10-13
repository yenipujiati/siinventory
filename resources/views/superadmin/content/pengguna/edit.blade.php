@extends('superadmin/layout/main')
@section('content')

    <form action="{{route('superadmin.pengguna.update')}}" method="post">
        @csrf
        <div class="form-group">
            <label >Nama</label>
            <input type="text" name="name" value="{{$pengguna->name}}" class ="form-control" placeholder="Nama" required>
        </div>

        <div class="form-group">
            <label >Email</label>
            <input type="email" name="email" value="{{$pengguna->name}}" class="form-control" placeholder="Email" required>
        </div>

        <div class="form-group">
            <label >Role </label>
            <select name="role" class="form-control" required >

                @php
                $admin ="";
                $sa ="";
                if ($pengguna->role =="admin"){
                    $admin = "selected";
                }else{
                    $sa ="selected";
                }
                @endphp

                <option value="admin"{{$admin}} >Admin</option>
                <option value="superadmin"{{$sa}}>Super Admin</option>
                </select>
        </div>

        <div class="form-group">
            <label >Status </label>
            <select name="status" class="form-control" required >

                @php
                $aktif ="";
                $tidakaktif ="";
                if ($pengguna->status =="1"){
                    $aktif = "selected";
                }else{
                    $tidakaktif ="selected";
                }
                @endphp

                <option value="1"{{$aktif}} >Aktif</option>
                <option value="0"{{$tidakaktif}}>Tidak Aktif</option>
                </select>
        </div>

        <div class="form-group">
            <label>Avatar</label>
            <input type="file" name="image" accept="image/png, image/jpeg, image/jpg" class="form-control">
        </div>


        <div class="form-group">
            <input type="hidden" name="id" value{{$pengguna->id}}">
            <input type="submit" value="Simpan" class="btn-sm btn-primary">

        </div>

    </form>
@endsection
