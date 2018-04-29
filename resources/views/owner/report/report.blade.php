@extends('layouts.owner')

@section('page-title')
	<p>รายการสรุป</p>
@endsection

@section('content')
	<div class="row">
		<div class="col">
			<p>ตาราง แผนภาพ พวกยอดขาย อาหารยอดฮิต ...</p>
		</div>
	</div>
	<div>
		<form class="" action="/report" method="post">
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
			<div id="select-date">
				<div class="form-group">
					<label>ค้นหาตาม: </label>
					<select class="form-control" id="selectBy" name="search_by">	
						<option value="all" selected>ทั้งหมด</option>	
						<option value="date">ตามวันที่</option>
					</select>
				</div>
				
				<div class="form-group" id="date">
					<label for="date">เลือกวันที่: </label>
					<input class="form-control" type="date" name="date" value="{{ old('date') }}">
				</div>
			</div>
			
			<div class="form-group row">
				<div class="col-sm-6">
					<button type="submit" class="btn btn-success">Submit</button>
				</div>	
			</div>
		</form>
	
	</div>
	<div class="">
		<div id="chart-div"></div>
      	{!! \Lava::render('DonutChart', 'cate_num', 'chart-div') !!}
	</div>
	<div>
		<canvas id="bar-chart" width="800" height="450"></canvas>
	</div>
@endsection

@push('js')
<script>
	$(document).ready(function(){
		$("#date").hide();
    $('#selectBy').on('change', function() {
      if ( this.value === 'all')
      {
        $("#date").hide();
      }
      else
      {
        $("#date").show();
      }
    });	
	});
</script>
@endpush