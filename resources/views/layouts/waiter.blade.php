@extends('layouts.master')
@section('menu-bar')
	<li class="nav-item">
	<a class="nav-link" href="{{url('/waiter/serve')}}">รายการอาหารรอเสิร์ฟ <span class="sr-only">(current)</span></a>
	</li>
	<li class="nav-item">
    <a class="nav-link" href="{{url('/waiter/manageTable')}}">จัดการโต๊ะ</a>
	</li>
@endsection

@section('btn-login-logout')
@if(Auth::check())
	<form action="/logout" method="POST">
		@csrf
		<button class="btn btn-secondary" value="submit">ออกจากระบบ</button>
	</form>
	@else
	<button type="button" class="btn btn-secondary">
		<a class="btn" href="/login">เข้าสู่ระบบ</a>
	</button>
	@endif
@endsection

@section('page-title')
<div class="">
	<h1 class="display-5">
		@yield('page-title-waiter')
	</h1>
</div>

@endsection

@section('content')
	@yield('content')
@endsection
