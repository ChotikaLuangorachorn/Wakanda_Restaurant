@extends('layouts.owner')

@section('page-title')
	<p>เพิ่มรายการอาหาร</p>
@endsection

@section('content')
<div class="row">
		
	</div>
	<div class="jumbotron">
  	<h2>เพิ่มรายการอาหาร</h2>
  	<p>โปรดกรอกทุกช่อง</p>
	</div>
	<div class="">
	<form class="" action="/menus" method="post" enctype="multipart/form-data">
  	@csrf
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
    		<input class="form-control" type="text" name="name" value="{{ old('name') }}">
  		</div>

  		<div class="form-group">
			<label>ประเภท: </label>
			<select class="form-control" name="category">
				@foreach($categories as $cate)
					@if(old('category')  == $cate->id)
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
					@if(old('status')  == $key)
						<option value="{{ $key }}" selected>{{ $value }}</option>
					@else
						<option value="{{ $key }}">{{ $value }}</option>
					@endif
				@endforeach
			</select>
		</div>

  		<div class="form-group">
    		<label for="price">ราคา: </label>
    		<input class="form-control" type="number" name="price" value="{{ old('price') }}">
      </div>
      
      <div class="form-group">
        <label for="image">รูปภาพ: </label>
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
