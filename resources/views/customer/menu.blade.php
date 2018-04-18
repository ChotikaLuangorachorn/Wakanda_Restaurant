@extends('layouts.customer')

@section('page-title')
	<p>รายการอาหาร</p>
@endsection

@section('content')
<!-- category -->
	<div class="row" style="text-align: center;">
		<div class="col">
			<button type="button" class="btn btn-secondary">อาหารเรียกน้ำย่อย</button>
		</div>
		<div class="col">
			<button type="button" class="btn btn-info">อาหารจานหลัก</button>
		</div>
		<div class="col">
			<button type="button" class="btn btn-warning">เครื่องดื่ม</button>
		</div>
		<div class="col">
			<button type="button" class="btn btn-danger">ของหวาน</button>
		</div>
	</div>
	<div class="row">
		<!-- <div class="col">
			@foreach($menus as $menu)
				{{ $menu->name }} <br>
			@endforeach
		</div> -->
		<div class="card border-secondary mb-3" style="max-width: 20rem; margin: 10px;">
			<div class="card-header bg-secondary">Header</div>
			<div class="card-body">
			<h4 class="card-title">Secondary card title</h4>
			<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
			</div>
		</div>
	</div>
@endsection

@push("js")
	<script src="/js/customer/menu.js" charset="utf-8"></script>