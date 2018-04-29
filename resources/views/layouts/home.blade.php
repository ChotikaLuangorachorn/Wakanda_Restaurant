@extends('layouts.master')
@section('menu-bar')
	<li class="nav-item">
		<a class="nav-link" href="#">หน้าหลัก<span class="sr-only">(current)</span></a>
	</li>
	<li class="nav-item">
    	
	</li>
@endsection
@section('btn-login-logout')
	<button type="button" class="btn btn-secondary">
		<a class="btn" href="/home">เข้าสู่ระบบ</a>
	</button>
@endsection

@section('page-title')
	@yield('page-title')
@endsection

@section('content')
	@yield('content')
@endsection