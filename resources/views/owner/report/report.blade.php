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
	<div class="">
		<div id="chart-div"></div>
      	{!! \Lava::render('DonutChart', 'IMDB', 'chart-div') !!}
	</div>
@endsection