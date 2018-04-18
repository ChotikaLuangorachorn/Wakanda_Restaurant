@extends('layouts.master')
@section('menu-bar')
	<li class="nav-item">
	<a class="nav-link" href="#">เมนูอาหาร<span class="sr-only">(current)</span></a>
	</li>
	<li class="nav-item">
    <a class="nav-link" href="#">รายการอาหารกำลังสั่ง</a>
	</li>
	<li class="nav-item">
    <a class="nav-link" href="#">รายการอาหารที่สั่งแล้ว</a>
	</li>
@endsection

@section('page-title')
	@yield('page-title')
@endsection

@section('content')
	@yield('content')
@endsection