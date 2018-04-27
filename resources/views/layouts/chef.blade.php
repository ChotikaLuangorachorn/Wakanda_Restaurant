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
		<div class="row" style="text-align:center;display:block;padding:10px 0px;padding-top:20px;background-color: white">

			@yield('page-title')
		</div>
	</div>	
@endsection

@section('content')
<div class="row" style="display:block">
	@yield('content')
@endsection