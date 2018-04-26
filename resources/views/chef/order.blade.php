@extends('layouts.chef')

@section('page-title')

	<h1 class="display-5"> รายการอาหารที่สั่ง</h1>
	
@endsection

@section('content')
	<div id="show-order">
	<table class="table" id="order-table">
		<thead class="table-danger">
			<tr>
			<th scope="col">หมายเลขโต๊ะ</th>
			<th scope="col">รายการอาหารที่สั่ง</th>
			<th scope="col">จำนวน</th>
			<th scope="col">สถานะ</th>
			</tr>
		</thead>
		<tbody>
			@foreach($orders as $order)
				<tr class="table-primary" id="{{ $order->id }}">
				<!-- <th scope="row">{{ $loop->iteration }}</th> -->
				<th>{{ $order->receipt->dining_table ?  $order->receipt->dining_table->id: "None" }}</th> 
				<th>{{ $order->menus ?  $order->menus->name: "None" }}</th> 
				<th>{{ $order->amount}}</th> 
				<!-- <th>{{ $order->status }}</th>  -->
				<th>
				<form action="/chef/orders" method="post">
					@method('PUT')
					@csrf
					<button type="button" id="cooking{{$order->id}}" class="btn btn-outline-secondary" v-on:click="changeStatusToCooking({{ $order->id }},{{ $order->menu_id}})">กำลังทำ</button>
				</form>

				<form>
					<button type="button" id="cooked{{$order->id}}" class="btn btn-success" hidden v-on:click="changeStatusToCooked({{ $order->id }},{{ $order->menu_id}})">ทำเสร็จแล้ว</button>
				</form>
					
				</th>
				</tr>
			@endforeach


		</tbody>
	</table>
	
	</div>
	<button id="btn-go-to-top" title="Go to top">Top</button>
	<div class="modal" id="confirm-modal">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title" id="modal-title"></h5>
		</div>
		<div class="modal-body">
			<p id="modal-text"></p>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-primary" id="save">ยืนยัน</button>
			<button type="button" class="btn btn-secondary" data-dismiss="modal" onclick='document.getElementById("confirm-modal").style.display="none";'>ยกเลิก</button>
		</div>
		</div>
	</div>
	</div>
@endsection

@push("js")
	<script>
		var csrf_token = "{{ csrf_token() }}";
		var menus = JSON.parse('{!! json_encode($menus)!!}')	</script>
	<script src="/js/chef/order.js" charset="utf-8"></script>
@endpush