@extends('admin/layout/main')
@section('content')

Ini Adalah Dashboard Admin.
<span>{{Helper::dateConverter(date('Y-m-d'))}}</span>
<a href="{{route('auth.logout')}}">Logout</a>

@endsection
