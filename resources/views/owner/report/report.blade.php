@extends('layouts.owner')

@section('page-title')
	<p>รายการสรุป</p>
@endsection

@section('content')
	<div style="background:white;padding:15px">
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
					<select class="form-control" id="selectBy" name="selectBy">	
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
					<button type="submit" class="btn btn-success">ค้นหา</button>
				</div>	
			</div>
		</form>
	
	</div>
	<div class="">
		<div id="chart-div"></div>
      		{!! \Lava::render('PieChart', 'cate_num', 'chart-div') !!}
		</div>
	<div>
	
	<div class="">
		<div id="chart-div-hit"></div>
			{!! \Lava::render('PieChart', 'hit_chart', 'chart-div-hit') !!}
		</div>
		<br>
	<div>

			<form class="" action="/report/orderpdf" method="post">
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
				<div>
					<p>ออกรายงานรายการสั่งอาหาร</p>
					<div class="form-group">
						<label>ออกรายงานตาม: </label>
						<select class="form-control" id="selectBy2" name="selectBy2">	
							<option value="all" selected>ทั้งหมด</option>	
							<option value="date">ตามวันที่</option>
						</select>
					</div>
					
					<div class="form-group" id="date2">
						<label for="date">เลือกวันที่: </label>
						<input class="form-control" type="date" name="date2" value="{{ old('date2') }}">
					</div>
				</div>
				
				<div class="form-group row">
					<div class="col-sm-6">
						<button type="submit" class="btn btn-success">ออกรายงาน</button>
					</div>	
				</div>
			</form>
		
		</div>
	</div>

@endsection

@push('js')
<script>
	$(document).ready(function(){
		if ($("#date").value === undefined){
			$("#date").hide();
		}
    	$('#selectBy').on('change', function() {
      		if ( this.value === 'all'){
        		$("#date").hide();
      		}
      		else{
        		$("#date").show();
      		}
		});	
		if ($("#date2").value === undefined){
			$("#date2").hide();
		}
    	$('#selectBy2').on('change', function() {
      		if ( this.value === 'all'){
        		$("#date2").hide();
      		}
      		else{
        		$("#date2").show();
      		}
    	});
	});
</script>
@endpush