@extends('layouts.master')
@section('menu-bar')
	<li class="nav-item">
	<a class="nav-link" href="/chef/orders">รายการอาหารที่สั่ง<span class="sr-only">(current)</span></a>
	</li>
	<li class="nav-item">
    <a class="nav-link" href="/chef/doneOrders">รายการอาหารที่ทำแล้ว</a>
	</li>
	<li class="nav-item">
    <a class="nav-link" href="#">จัดการรายการอาหาร</a>
	</li>
@endsection

@section('page-title')
	<div class="jumbotron">

		@yield('page-title')
	</div>	
@endsection

@section('content')
	@yield('content')
@endsection