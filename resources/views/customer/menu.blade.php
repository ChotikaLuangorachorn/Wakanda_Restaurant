@extends('layouts.customer')

@section('page-title')
	<p>รายการอาหาร</p>
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
							<div class="row" id="number">
								<div class="col-sm-4" style="text-align: right; padding: 0px;">
									<i class="btn material-icons" style="font-size: 36px; color: var(--danger);" v-on:click="decrease({{$menu->id}})">remove_circle_outline</i>
								</div>
								<div class="col-sm-4" >
									<div class="form-group">
										<input class="form-control" id="number-order" type="text"  id="{{$menu->id}}" placeholder="จำนวน" style="text-align:center;" maxlength="2" size="2">
									</div>
								</div>
								<div class="col-sm-4" style="text-align: left; padding: 0px;">
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

@endsection

@push("js")
	<script>
		var categories = JSON.parse('{!! json_encode($categories) !!}');
	</script>
	<script src="/js/customer/menu.js" charset="utf-8"></script>
@endpush