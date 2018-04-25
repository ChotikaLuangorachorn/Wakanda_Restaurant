@extends('layouts.chef')

@section('page-title')

	<h1 class="display-5"> รายการอาหารที่สั่ง</h1>
	
@endsection

@section('content')
	<div>
	<table class="table ">
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
				<tr class="table-primary">
				<!-- <th scope="row">{{ $loop->iteration }}</th> -->
				<th>{{ $order->receipt->dining_table ?  $order->receipt->dining_table->id: "None" }}</th> 
				<th>{{ $order->menus ?  $order->menus->name: "None" }}</th> 
				<th>{{ $order->amount}}</th> 
				<!-- <th>{{ $order->status }}</th>  -->
				<th>
					<button type="button" class="btn btn-secondary">กำลังทำ</button>
					<button type="button" class="btn btn-success">ทำเสร็จแล้ว</button>
					
				</th>
				</tr>
			@endforeach


		</tbody>
	</table>
	<!-- <button id="btn-go-to-top" title="Go to top">Top</button> -->
	</div>
@endsection