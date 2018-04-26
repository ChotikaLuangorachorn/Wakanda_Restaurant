@extends('layouts.customer')

@section('page-title')
	<div class="col-sm-10">
		<h2><i class="fas fa-utensils"></i> รายการอาหาร</h2>
		
	</div>
	<div class="col-sm-2" style="text-align: right;">
		<i class="btn fas fa-shopping-basket"  style="color:var(--pink); font-size: 36px;"></i>
	</div>

	<div class="modal" id="modal-basket">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
		    	<div class="modal-header">
		    		<h5 class="modal-title">รายการอาหารที่คุณกำลังสั่ง</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="document.getElementById('modal-basket').style.display='none'">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<table id="ordering-table">
	                    <thead>
	                        <tr style="text-align: center;">
	                            <th onclick="" scope="col" style="width: 250px;">รายการอาหาร</th>
	                            <th onclick="" scope="col" style="width: 100px;">จำนวน</th>
	                            <th onclick="" scope="col" style="width: 100px;">ราคา</th>
	                        </tr>
	                    </thead>
	                    <tbody id='tbody-ordering'>
	                    </tbody>
	                </table>
	                <br>
	                <b class="float-left">ราคารวม <span id="total_price">0</span> บาท</b>
					<button type="button" class="btn btn-secondary float-right" id="btn-purchase">ชำระเงิน</button>
				</div>
				<div class="modal-footer row">
					<div class="col-sm-9" style="margin:0 auto; text-align: center;">
						<form action="/customer/{{$dining_table->id}}" id='form-purchase' method="post">
							 {{ csrf_field() }}
							@if ($errors->any())
							    <div class="alert alert-warning" style="text-align: left;">
							        <ul>
							            @foreach ($errors->all() as $error)
							                <li>{{ $error }}</li>
							            @endforeach
							        </ul>
							    </div>
							@endif							 
							<input name="order" id="order" type="text" value="" hidden="true">
							<input class='form-control' type="number" name="cardNumber" maxlength="16" placeholder='Card Number' value="{{ old('cardNumber') }}">
							<input class='form-control' id="month" type="month" name='exp' placeholder='Expire Date' value="{{ old('exp') }}">
							<input class='form-control' type="number" name="cvv" maxlength="3" placeholder='CVV' value="{{ old('cvv') }}"><hr>
							<button type="submit" id="btn-submit-purchase" class="btn btn-primary">ยืนยันการชำระเงิน</button>
						</form>
					</div>
				</div>
	    	</div>
		</div>
	</div>

	<button id="btn-go-to-top" title="Go to top">Top</button>
	<i class="btn fas fa-shopping-basket" id='btn-basket' style="color:var(--pink); font-size: 36px;"></i>

@endsection

@section('content')
<!-- category -->
	<div class="row" id="btn-category" style="text-align: center;">
		@foreach($categories as $category)
		<div class="col">
			<button type="button" class="btn btn-warning" id='btn-category{{$category->id}}' value="category{{$category->id}}" v-on:click="showMenu({{$category->id}})" style="color: var(--gray-dark);">{{$category->name}}</button>
		</div>
		@endforeach
	</div>

	<div id="menu-list">
	@foreach($categories as $category)
		<!-- <div class="col">
			@foreach($menus as $menu)
				{{ $menu->name }} <br>
			@endforeach
		</div> -->
		<div class="row" id="card-category{{$category->id}}">
			@foreach($menus as $menu)
				@if ($menu->category_id==$category->id)
				<div class="card border-danger mb-3" style="text-align: center;max-width: 20rem; margin: 10px;">
					<div class="card-header bg-danger">{{$menu->name}}</div>
					<div class="card-body">
						<!-- <h4 class="card-title"></h4> -->
						@if ($menu->image_path!='')
						<div id='img-menu' style="width: 100%;height: 150px;background: url(/images/menu/{{$menu->image_path}});background-repeat: no-repeat;background-size: cover;background-position: center">
						</div>
						@else
						<div id='img-menu' style="width: 100%;height: 150px;background: url(/images/menu/no_image.jpg);background-repeat: no-repeat;background-size: cover;background-position: center">
						</div>
						@endif
						<div class="card-text">
							<p>{{number_format($menu->price,2)}} บาท</p>
							<div class="row">
								<div class="col-sm-4" id='btn-decrease' style="padding: 0px;">
									<i class="btn material-icons" style="font-size: 36px; color: var(--danger);" v-on:click="decrease({{$menu->id}})">remove_circle_outline</i>
								</div>
								<div class="col-sm-4" >
									<div class="form-group">
										<input class="form-control" type="text"  id="number-menu{{$menu->id}}" placeholder="จำนวน" style="text-align:center;" maxlength="2" size="2" value='0' readonly>
									</div>
								</div> 
								<div class="col-sm-4" id='btn-increase' style="padding: 0px;">
									<i class="btn material-icons" style="font-size: 36px;color: var(--info);" v-on:click="increase({{$menu->id}})">add_circle_outline</i>
								</div>
						    </div>					
						</div>
					</div>
				</div>
				@endif
			@endforeach
		</div>
	@endforeach
	</div>

@endsection

@push("js")
	<script>
		var categories = JSON.parse('{!! json_encode($categories) !!}');
		var menus = JSON.parse('{!! json_encode($menus) !!}');
	</script>
	<script src="/js/customer/menu.js" charset="utf-8"></script>
@endpush