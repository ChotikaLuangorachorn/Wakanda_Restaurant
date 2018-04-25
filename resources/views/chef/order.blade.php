@extends('layouts.chef')

@section('page-title')
	<p>รายการอาหารที่สั่ง</p>
@endsection

@section('content')
	<div>
	<table class="table ">
		<thead>
			<tr>
			<th scope="col">หมายเลขโต๊ะ</th>
			<th scope="col">รายการอาหารที่สั่ง</th>
			<th scope="col">จำนวน</th>
			<th scope="col">สถานะ</th>
			</tr>
		</thead>


		<tbody>

			@foreach($orders as $order)
				<tr class="table-primary">
				<!-- <th scope="row">{{ $loop->iteration }}</th> -->
				<th>{{ $order->receipt->dining_table ?  $order->receipt->dining_table->id: "None" }}</th> 
				<th>{{ $order->menus ?  $order->menus->name: "None" }}</th> 
				<th>{{ $order->amount}}</th> 
				<!-- <th>{{ $order->status }}</th>  -->
				<th>
					<button type="button" class="btn btn-outline-success">กำลังทำ</button>
					<button type="button" class="btn btn-outline-secondary">ทำเสร็จแล้ว</button>
					
				</th>
				</tr>
			@endforeach


		</tbody>
	</table>
	</div>
@endsection