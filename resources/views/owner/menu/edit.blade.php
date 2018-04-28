@extends('layouts.owner')

@section('page-title')
	<p>แก้ไขรายการอาหาร</p>
@endsection

@section('content')
	<div class="row">
		
	</div>
	<div class="jumbotron">
  	<h2>แก้ไขรายการอาหาร</h2>
  	<p>โปรดกรอกทุกช่อง</p>
	</div>
	<div class="">
		@if ($menu->image_path!='')
			<div id='img-menu' style="width: 50%;height: 250px;background: url(/images/menu/{{$menu->image_path}});background-repeat: no-repeat;background-size: cover;background-position: center">
        	</div>
        	<br>
	    @endif
	<form class="" action="/menus/{{ $menu->id }}" method="post" enctype="multipart/form-data">
  		@csrf
		@method('PUT')
  		@if ($errors->any())
      	<div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
      	</div>
  		@endif
  		<div class="form-group">
    		<label for="name">ชื่อ: </label>
    		<input class="form-control" type="text" name="name" value="{{ old('name') ?? $menu->name }}">
  		</div>

  		<div class="form-group">
			<label>ประเภท: </label>
			<select class="form-control" name="category">
				@foreach($categories as $cate)
					@if((old('category') ?? $menu->category_id ) == $cate->id)
					  	<option value="{{ $cate->id }}" selected>{{ $cate->name }}</option>
					@else
					  	<option value="{{ $cate->id }}">{{ $cate->name }}</option>
					@endif
				@endforeach
			</select>
		</div>

		<div class="form-row">
			<label>สถานะ: </label>
			<select class="form-control" name="status">
				@foreach($status as $key=>$value)
					@if((old('status') ?? $menu->status) == $key)
						<option value="{{ $key }}" selected>{{ $value }}</option>
					@else
						<option value="{{ $key }}">{{ $value }}</option>
					@endif
				@endforeach
			</select>
		</div>

  		<div class="form-group">
    		<label for="price">ราคา: </label>
    		<input class="form-control" type="number" name="price" value="{{ old('price') ?? $menu->price }}">
		</div>
		  
		<div class="form-group">
			<label for="image">รูปภาพ: (สามารถเว้นว่างไว้ได้กรณีที่ไม่ต้องการเปลี่ยน)</label>
			<input class="form-control" type="file" name="image" value="{{ old('image') }}">
		</div>


  		<div class="form-group row">
    		<div class="col-sm-6">
      		<button type="submit" class="btn btn-success">ตกลง</button>
    		</div>
    		<div class="col-sm-6">
      		<button type="reset" class="btn btn-danger">รีเซ็ต</button>
    		</div>
  		</div>
		</form>

	</div>
@endsection
