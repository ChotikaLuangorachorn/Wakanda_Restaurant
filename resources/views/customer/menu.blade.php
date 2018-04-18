@extends('layouts.customer')

@section('page-title')
	<p>รายการอาหาร</p>
@endsection

@section('content')
	<div class="row">
		<div class="col">
			@foreach($menus as $menu)
				{{ $menu->name }} <br>
			@endforeach
		</div>
	</div>
@endsection