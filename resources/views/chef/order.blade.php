@extends('layouts.chef')

@section('page-title')

		<h1> รายการอาหารที่สั่ง</h1>
	
@endsection
@push('css')
<style>
.my-class {
   font-size: 1.6em;
}
/* .container {
  background-color: white;
} */
</style>
@endpush

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
				<td>{{ $order->receipt->dining_table ?  $order->receipt->dining_table->id: "None" }}</td> 
				<td>{{ $order->menus ?  $order->menus->name: "None" }}</td> 
				<td>{{ $order->amount}}</td> 
				<!-- <th>{{ $order->status }}</th>  -->
				<td>
				<!-- <form action="/chef/orders/{{$order->id}}" method="post">
					@method('PUT')
					@csrf
					@if($order->status === 'wait')
						<label class="btn btn-outline-secondary" for="status_input{{$order->id}}"><input hidden type="submit" class="btn btn-outline-secondary" id="status_input{{$order->id}}" name="status" value="cooking" />กำลังทำ</label>
					@elseif($order->status === 'cooking')
						<label class="btn btn-success" for="status_input{{$order->id}}"><input hidden type="submit" class="btn btn-success" id="status_input{{$order->id}}" name="status" value="cooked" />ทำเสร็จแล้ว</label>
					@endif
				</form> -->
					<button type="button" id="status{{$order->id}}" class="btn {{$order->status === 'wait' ? 'btn-outline-secondary' : 'btn-success'}}" v-on:click="changeStatusToCooking({{ $order->id }},{{ $order->menu_id}})">{{$order->status === 'wait' ? 'กำลังทำ' : 'ทำเสร็จแล้ว'}}</button>
<!-- 				
					<button {{$order->status === 'wait' ? '' : 'hidden'}} type="button" id="cooking{{$order->id}}" class="btn btn-outline-secondary" v-on:click="changeStatusToCooking({{ $order->id }},{{ $order->menu_id}})">กำลังทำ</button>
				
					<button {{$order->status === 'cooking' ? '' : 'hidden'}} type="button" id="cooked{{$order->id}}" class="btn btn-success"  v-on:click="changeStatusToCooked({{ $order->id }},{{ $order->menu_id}})">ทำเสร็จแล้ว</button> -->
				
				
				<!-- <form action="/chef/orders/{{$order->id}}" method="post">
					@method('PUT')
					@csrf
					@if($order->status === 'wait')
						<button type="button" id="cooking{{$order->id}}" class="btn btn-outline-secondary" v-on:click="changeStatusToCooking({{ $order->id }},{{ $order->menu_id}})">กำลังทำ</button>
					
					@endif
					
				</form>

				<form action="/chef/orders" method="post">
					@csrf
					@if($order->status === 'cooking')
						<button type="button" id="cooked{{$order->id}}" class="btn btn-success"  v-on:click="changeStatusToCooked({{ $order->id }},{{ $order->menu_id}})">ทำเสร็จแล้ว</button>
					@endif
				</form> -->
					
				</td>
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