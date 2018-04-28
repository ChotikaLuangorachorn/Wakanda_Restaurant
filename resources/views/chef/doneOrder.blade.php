@extends('layouts.chef')

@section('page-title')

		<h1> รายการอาหารที่สั่ง</h1>
	
@endsection
@push('css')
<style>
.my-class {
   font-size: 1.6em;
}
th {
	cursor: pointer;
}
/* .container {
  background-color: white;
} */
</style>
@endpush

@section('content')
	<div id="show-order">
	<table class="table">
		<thead class="table-success">
			<tr>
            <th scope="col" >หมายเลขโต๊ะ</th>
			<th scope="col">รายการอาหารที่สั่ง</th>
			<th scope="col" >จำนวนที่สั่ง</th>
			<th scope="col">สถานะ</th>
			</tr>
		</thead>
		<tbody>
			@foreach($orders as $order)
				<!-- <td scope="row">{{ $loop->iteration }}</td> -->
				<td>{{ $order->receipt->dining_table ?  $order->receipt->dining_table->id: "None" }}</td> 
				<td>{{ $order->menus ?  $order->menus->name: "None" }}</td> 
				<td>{{ $order->amount}}</td> 
				<td>
                    @if($order->status === 'cooked')
                        เสร็จแล้ว
                    @endif
                </td> 
				</tr>
			@endforeach


		</tbody>
	</table>
	
	</div>
@endsection