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
			<div class="form-group">
				<label>ค้นหาตาม: </label>
				<select class="form-control" name="role">	
					<option value="all" selected>ทั้งหมด</option>	
					<option value="date">ตามวันที่</option>
				</select>
			</div>

			<div class="form-group">
				<label for="password_confirmation">Confirm Password: </label>
				<input class="form-control" type="password" name="password_confirmation" value="{{ old('password_confirmation') }}">
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

{{-- @push('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
<script>
	new Chart(document.getElementById("bar-chart"), {
    type: 'bar',
    data: {
      labels: ["Africa", "Asia", "Europe", "Latin America", "North America"],
      datasets: [
        {
          label: "Population (millions)",
          backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
          data: [2478,5267,734,784,433]
        }
      ]
    },
    options: {
      legend: { display: false },
      title: {
        display: true,
        text: 'Predicted world population (millions) in 2050'
      }
    }
});
</script>
@endpush --}}