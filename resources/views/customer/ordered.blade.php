@extends('layouts.customer')

@section('page-title')
	<div class="col-sm-12" style="text-align: center;">
		<h2>รายการอาหารที่คุณสั่งแล้ว</h2>
	</div>



@endsection

@section('content')
<!-- ordered -->
	<div class="row" id="btn-category" style="text-align: center;">
		<div class="col-sm-6" style="background-color: red;">
			<p>กำลังรอ</p>
			<table class="table table-hover">
				<thead>
					<tr>
				    	<th scope="col">รายการอาหาร</th>
				    	<th scope="col">จำนวน</th>
				    </tr>
				</thead>
				<tbody>
				    <tr class="table-active">
				      	<td>Column content</td>
				      	<td>Column content</td>
				    </tr>
			  	</tbody>
			</table> 
		</div>
		<div class="col-sm-6" style="background-color: blue;">
			<p>กำลังทำ</p>
		</div>
	</div>

@endsection

@push("js")
	<script src="/js/customer/menu.js" charset="utf-8"></script>
@endpush