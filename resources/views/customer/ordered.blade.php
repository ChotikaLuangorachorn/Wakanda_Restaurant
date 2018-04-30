@extends('layouts.customer')

@section('page-title')
	<div class="col-sm-12" style="text-align: center;">
		<h3>โต๊ะที่: {{$dining_table->id}}</h3>	
		<h3>รายการอาหารที่คุณสั่งแล้ว</h3>
	</div>



@endsection

@section('content')
<!-- ordered -->
	<div class="row" id="btn-category" style="text-align: center;">
		<div class="col-sm-6">
			<h4>กำลังรอ</h4>
			<table class="table table-hover">
				<thead>
					<tr class="table-info">
				    	<th scope="col">รายการอาหาร</th>
				    	<th scope="col">จำนวน</th>
				    	<th scope="col">ใบเสร็จที่</th>
				    </tr>
				</thead>
				<tbody>
					@foreach($receipts as $receipt)
				    	@foreach($receipt->orders as $order)
				    		@if($order->status==='wait')
						    <tr class="table-primary">
						      	<td>{{$order->menus->name}}</td>
						      	<td>{{$order->amount}}</td>
						      	<td>{{$receipt->id}}</td>
						    </tr>
						    @endif
				    	@endforeach
				    @endforeach
			  	</tbody>
			</table> 
		</div>
		<div class="col-sm-6" >
			<h4>กำลังทำ</h4>
			<table class="table table-hover">
				<table class="table table-hover">
				<thead>
					<tr class="table" style="background-color: var(--pink);color: var(--white);">
				    	<th scope="col">รายการอาหาร</th>
				    	<th scope="col">จำนวน</th>
				    	<th scope="col">ใบเสร็จที่</th>
				    </tr>
				</thead>
				<tbody>
					@foreach($receipts as $receipt)
				    	@foreach($receipt->orders as $order)
				    		@if($order->status==='cooking')
						    <tr class="table-secondary">
						      	<td>{{$order->menus->name}}</td>
						      	<td>{{$order->amount}}</td>
						      	<td>{{$receipt->id}}</td>
						    </tr>
						    @endif
				    	@endforeach
				    @endforeach
			  	</tbody>
			</table> 
		</div>
	</div>

@endsection

@push("js")
	<script src="/js/customer/menu.js" charset="utf-8"></script>
@endpush