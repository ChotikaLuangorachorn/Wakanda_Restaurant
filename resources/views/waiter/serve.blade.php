@extends('layouts.waiter')

@section('page-title-waiter')
	รายการอาหารรอเสิร์ฟ
@endsection

@section('content')
	<div class="row justify-content-between align-items-center d-flex pr-5 pl-5 pb-5">
				ตารางรายการอาหารที่ต้องเสิร์ฟจำนวน {{$countOrder}} รายการ

</div>
<form action="/waiter/serve" method="post">

	@csrf

	<button class="btn btn-warning btn-lg" type="submit" name="button">ส่ง</button>

			<table class="table">
  			<thead>
    			<tr class="table-danger">
						<th scope="col">#</th>
      			<th scope="col">ชื่ออาหาร</th>
						<th scope="col">จำนวน</th>
      			<th scope="col">โต๊ะที่</th>
      			<th scope="col">เช็ค</th>
    			</tr>
  			</thead>
  			<tbody class="table-hover">
					@foreach($orders as $order)
					<tr class="table-secondary">

							<th scope="row">{{ $loop->iteration }}</th>
							<td>{{$order->menus->name}}</td>
							<td>{{$order->amount}}</td>
							<td>{{$order->receipt->table_id}}</td>
							<td>
								@if($order->status == 'served')
									<div class="custom-control custom-checkbox">
								      <input type="checkbox" class="custom-control-input" id="{{$order->id}}" checked="" disabled="" name="checkOrder[]">
								      <label class="custom-control-label" for="{{$order->id}}"></label>
									</div>
								@else
								<div class="custom-control custom-checkbox">
										<input type="checkbox" class="custom-control-input" id="{{$order->id}}" name="checkOrder[]" value="{{$order->id}}">
										<label class="custom-control-label" for="{{$order->id}}"></label>
								</div>
								@endif

							</td>


					</tr>
					@endforeach
				</tbody>
			</table>

</form>
@endsection
