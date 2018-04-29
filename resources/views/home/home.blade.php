@extends('layouts.home')

@section('page-title')
	<div class="col-sm-12">
		<h2>Wakanda Restaurant</h2>
	</div>
@endsection

@section('content')
	<div class="row">
		<div class="col">
			<p>{{$dining_tables}}</p>
		</div>
	</div>
@endsection

@push("js")
	<script src="/js/home/home.js" charset="utf-8"></script>
@endpush