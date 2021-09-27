@extends('superadmin/layout/main')
@section('content')

Ini Adalah Dashboard Superadmin.

<a href="{{route('auth.logout')}}">Logout</a>
<span>{{Helper::dateConverter(date('Y-m-d'))}}</span>
@endsection
