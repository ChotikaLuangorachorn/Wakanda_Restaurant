@extends('layouts.master')
@section('menu-bar')
	<li class="nav-item">
	<a class="nav-link" href="#">รายการอาหารที่สั่ง<span class="sr-only">(current)</span></a>
	</li>
	<li class="nav-item">
    <a class="nav-link" href="#">รายการอาหารที่ทำแล้ว</a>
	</li>
	<li class="nav-item">
    <a class="nav-link" href="#">จัดการรายการอาหาร</a>
	</li>
@endsection

@section('page-title')
	@yield('page-title')
@endsection

@section('content')
	@yield('content')
@endsection