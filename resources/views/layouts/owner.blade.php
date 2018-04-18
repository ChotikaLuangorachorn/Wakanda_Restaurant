@extends('layouts.master')
@section('menu-bar')
	<li class="nav-item">
	<a class="nav-link" href="#">รายงานสรุป<span class="sr-only">(current)</span></a>
	</li>
	<li class="nav-item">
    <a class="nav-link" href="#">จัดการสมุดรายการอาหาร</a>
	</li>
	<li class="nav-item">
    <a class="nav-link" href="#">จัดการพนักงาน</a>
	</li>
@endsection

@section('page-title')
	@yield('page-title')
@endsection

@section('content')
	@yield('content')
@endsection