@extends('superadmin/layout/main')
@section('content')

Ini Adalah Dashboard Admin.

<a href="{{route('auth.logout')}}">Logout</a>

@endsection
