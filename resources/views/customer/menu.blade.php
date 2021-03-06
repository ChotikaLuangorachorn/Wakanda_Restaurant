@extends('layouts.customer')

@section('page-title')
		<div class="row">
			<div class="col-sm-12">
				<h3>โต๊ะที่: {{$dining_table->id}}</h3>
				<h3><i class="fas fa-utensils"></i> รายการอาหาร</h3>
				<input class="form-control mr-sm-2 float-left" id="search" type="text" placeholder="ค้นหารายการอาหาร...">

				<i class="btn fas fa-shopping-basket float-right"  style="color:var(--pink); font-size: 36px;">
				</i>
				
			</div>
		</div>	

	<div class="modal" id="modal-basket">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
		    	<div class="modal-header">
		    		<h5 class="modal-title">
		    			<i class="fas fa-clipboard-list" style="font-size: 32px;"></i> 
		    			รายการอาหารที่คุณกำลังสั่ง
		    		</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="document.getElementById('modal-basket').style.display='none'">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div style="background-color: var(--gray);height: 300px;overflow-y: scroll;">
					<table id="ordering-table" >
	                    <thead>
	                        <tr style="text-align: center;">
	                            <th onclick="" scope="col" style="width: 250px;">รายการอาหาร</th>
	                            <th onclick="" scope="col" style="width: 100px;">จำนวน</th>
	                            <th onclick="" scope="col" style="width: 100px;">ราคา</th>
	                        </tr>
	                    </thead>
	                    <tbody id='tbody-ordering'>
	                    </tbody>
	                </table></div>
	                <br>
	                <b class="float-left">ราคารวม <span id="total_price">0</span> บาท</b>
					<button type="button" class="btn btn-secondary float-right" id="btn-purchase">ชำระเงิน</button>
				</div>
	    	</div>
		</div>
	</div>
	<div class="modal" id="modal-purchase">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
		    	<div class="modal-header">
		    		<h5 class="modal-title">
		    			<i class="far fa-credit-card" style="font-size: 32px;"></i> กรอกข้อมูลเพื่อชำระเงิน
		    		</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="document.getElementById('modal-purchase').style.display='none'">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div>
						<img src="/images/theme/master-card.jpg" style="height: 80px;border: 2px solid;">
						<img src="/images/theme/visa.jpg" style="height: 80px;border: 2px solid;">
						<img src="/images/theme/discover.jpg" style="height: 80px;border: 2px solid;">
					</div>
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
						<label>Name</label>
						<input class='form-control' type="text" name="name" maxlength="16" placeholder='Name' value="{{ old('name') }}">
						<label>Card Number</label>
						<input class='form-control' type="number" name="cardNumber" maxlength="16" placeholder='Card Number' value="{{ old('cardNumber') }}">
						<label>Expire Date</label>
						<input class='form-control' id="month" type="month" name='exp' placeholder='Expire Date' value="{{ old('exp') }}">
						<label>CVV</label>
						<input class='form-control' type="number" name="cvv" maxlength="3" placeholder='CVV' value="{{ old('cvv') }}"><hr>
						<button type="submit" id="btn-submit-purchase" class="btn btn-primary">ยืนยันการชำระเงิน</button>
					</form>
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
		<div class="col" style="padding: 5px;">
			<button type="button" class="btn btn-warning" id='btn-category{{$category->id}}' value="category{{$category->id}}" v-on:click="showMenu({{$category->id}})" style="color: var(--gray-dark);">{{$category->name}}</button>
		</div>
		@endforeach
	</div>
	<div class="" id="menu-list">
	@foreach($categories as $category)
		<div class="row card-menu" id="card-category{{$category->id}}" style="margin: 10px;">
			@foreach($menus as $menu)
				@if ($menu->category_id==$category->id)
				<div class="card border-danger mb-3" style="text-align: center;width: 15rem;margin: 10px;">
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