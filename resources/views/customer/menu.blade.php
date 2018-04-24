@extends('layouts.customer')

@section('page-title')
	<div class="col-sm-10">
		<h2>รายการอาหาร</h2>
		
	</div>
	<div class="col-sm-2" style="text-align: right;">
		<i class="btn fas fa-shopping-basket" onclick="document.getElementById('modal-basket').style.display='block'" style="color:var(--info); font-size: 36px;"></i>
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
	        <p>Modal body text goes here.</p>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-primary">ชำระเงิน</button>
	      </div>
	    </div>
	  </div>
	</div>

	<button id="btn-go-to-top" title="Go to top">Top</button>
	<i class="btn fas fa-shopping-basket" id='btn-basket' onclick="document.getElementById('modal-basket').style.display='block'" style="color:var(--info); font-size: 36px;"></i>



@endsection

@section('content')
<!-- category -->
	<div class="row" id="btn-category" style="text-align: center;">
		@foreach($categories as $category)
		<div class="col">
			<button type="button" class="btn btn-danger" id='btn-category{{$category->id}}' value="category{{$category->id}}" v-on:click="showMenu({{$category->id}})">{{$category->name}}</button>
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
						<img src="/images/menu/{{$menu->image_path}}" style="width: 100%">
						@endif
						<p class="card-text">
							<p>{{number_format($menu->price,2)}} บาท</p>
							<div class="row">
								<div class="col-sm-4" id='btn-decrease' style="padding: 0px;">
									<i class="btn material-icons" style="font-size: 36px; color: var(--danger);" v-on:click="decrease({{$menu->id}})">remove_circle_outline</i>
								</div>
								<div class="col-sm-4" >
									<div class="form-group">
										<input class="form-control" type="text"  id="number-menu{{$menu->id}}" placeholder="จำนวน" style="text-align:center;" maxlength="2" size="2" value='0'>
									</div>
								</div> 
								<div class="col-sm-4" id='btn-increase' style="padding: 0px;">
									<i class="btn material-icons" style="font-size: 36px;color: var(--info);" v-on:click="increase({{$menu->id}})">add_circle_outline</i>
								</div>
						    </div>					
						</p>
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