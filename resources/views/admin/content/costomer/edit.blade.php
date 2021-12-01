@extends('admin/layout/main')
@section('content')

    <form action="{{route('admin.costomer.update', $costomer->id)}}" method="post">
        @csrf
        <div class="form-group">
            <label >Name</label>
            <input type="text" name="name" value="{{$costomer->name}}" class ="form-control" placeholder="Name" required>
        </div>

        <div class="form-group">
            <label >Address</label>
            <input type="text" name="alamat" value="{{$costomer->alamat}}" class="form-control" placeholder="Address" required>
        </div>

        <div class="form-group">
            <label >Phone Number</label>
            <input type="text" name="nomber" value="{{$costomer->nomber}}" class="form-control" placeholder="Phone Number" required>
        </div>
        <div class="form-group">
            <label >Email</label>
            <input type="email" name="email" value="{{$costomer->email}}" class="form-control" placeholder="Email" required>
        </div>

        <div class="form-group">
            <input type="hidden" name="id" value{{$costomer->id}}">
            <input type="submit" value="Simpan" class="btn-sm btn-primary">

        </div>

    </form>
@endsection
