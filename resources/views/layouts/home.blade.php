@extends('layouts.master')
@section('menu-bar')
	<li class="nav-item">
		<a class="nav-link" href="#">หน้าหลัก<span class="sr-only">(current)</span></a>
	</li>
	<li class="nav-item">
    	
	</li>
@endsection
@section('btn-login-logout')
	@if(Auth::check())
	<form action="/logout" method="POST">
		@csrf
		<button class="btn btn-secondary" value="submit">sign out</button>
	</form>
	@else
	<button type="button" class="btn btn-secondary">
		<a class="btn" href="/login">เข้าสู่ระบบ</a>
	</button>
	@endif
@endsection

@section('page-title')
	@yield('page-title')
@endsection

@section('content')
	@yield('content')
@endsection