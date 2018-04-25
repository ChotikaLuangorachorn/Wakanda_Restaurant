@extends('layouts.waiter')

@section('page-title-waiter')
	รายการอาหารรอเสิร์ฟ
@endsection

@section('content')
	<div class="row">
		<div class="col">
			<p>ตารางรายการอาหาร</p>
			<table class="table">
  			<thead>
    			<tr class="table-danger">
						<th scope="col">#</th>
      			<th scope="col">menu</th>
						<th scope="col">amount</th>
      			<th scope="col">table</th>
						<th scope="col">status</th>
      			<th scope="col">check</th>
    			</tr>
  			</thead>
  			<tbody class="table-hover">
					@foreach($orders as $order)
					<tr class="table-secondary">

							<th scope="row">{{ $loop->iteration }}</th>
							<td>{{$order->menus->name}}</td>
							<td>{{$order->amount}}</td>
							<td>{{$order->receipt->table_id}}</td>
							<td>{{$order->status}}</td>
							<td>eiei</td>


					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
@endsection
