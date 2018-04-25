@extends('layouts.master')
@section('menu-bar')
	<li class="nav-item">
	<a class="nav-link" href="{{url('/waiter/serve')}}">รายการอาหารรอเสิร์ฟ <span class="sr-only">(current)</span></a>
	</li>
	<li class="nav-item">
    <a class="nav-link" href="{{url('/waiter/manage_table')}}">จัดการโต๊ะ</a>
	</li>
@endsection

@section('page-title')
<div class="border border-info rounded offset-1 m-5">
	<h1 class="display-5">
		@yield('page-title-waiter')
	</h1>
</div>

@endsection

@section('content')
	@yield('content')
@endsection
