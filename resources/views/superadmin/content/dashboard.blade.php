@extends('superadmin/layout/main')
@section('content')

Ini Adalah Dashboard Superadmin.

<span>{{Helper::dateConverter(date('Y-m-d'))}}</span>
@endsection
