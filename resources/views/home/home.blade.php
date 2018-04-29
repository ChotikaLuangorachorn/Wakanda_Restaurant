@extends('layouts.home')

@section('page-title')
	<div class="col-sm-12">
		<h2>Wakanda Restaurant</h2>
	</div>
@endsection

@section('content')
	<div class="row">
		<div class="col-sm-12" style="text-align: center;">
			<h3>จำนวนโต๊ะว่าง</h3>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-12" style="text-align: center;">
			<div style="background: var(--pink); width: 100px;height: 50px;text-align: center;">
				{{$dining_tables->count()}}
			</div>
		</div>
	</div>
@endsection

@push("js")
	<script src="/js/home/home.js" charset="utf-8"></script>
@endpush