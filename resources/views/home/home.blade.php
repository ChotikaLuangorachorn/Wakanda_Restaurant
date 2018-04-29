@extends('layouts.home')

@section('page-title')
	<div class="col-sm-12">
		<h2>Wakanda Restaurant</h2>
	</div>
@endsection

@section('content')
	<div class="row">
		<div class="col-sm-9">
			<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" style="width: 70%;">
  			<ol class="carousel-indicators">
			    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
			    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
			    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
			    <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
			    <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
  			</ol>
				<div class="carousel-inner">

			    @foreach($rand_menus as $menu)
			    	@if($loop->iteration==1)
			    		<div class="carousel-item active" style="width: 100%;height: 300px;background: url(/images/menu/{{$menu->image_path}});background-repeat: no-repeat;background-size: cover;background-position: center">
			    		</div>
			    	@else
					    <div class="carousel-item" style="width: 100%;height: 300px;background: url(/images/menu/{{$menu->image_path}});background-repeat: no-repeat;background-size: cover;background-position: center">
					    </div>
					   @endif
			    @endforeach
			</div>
		  	<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
		    	<span class="carousel-control-prev-icon" aria-hidden="true"></span>
		    	<span class="sr-only">Previous</span>
		  	</a>
		  	<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
	    		<span class="carousel-control-next-icon" aria-hidden="true"></span>
	    		<span class="sr-only">Next</span>
	  		</a>
			</div>
		</div>
		<div class="col-sm-3">
			<div class="row">
				<div class="col-sm-12" style="text-align: center;">
					<h3>จำนวนโต๊ะว่าง</h3>
				</div>
			</div>
			<div class="row" style="text-align: center">
				<div class="col-sm-12" style="margin: auto;background-color: var(--secondary);">
					<div style="">
					<h3 >{{$dining_tables->count()}}</h3></div>
				</div>
			</div>			
		</div>
	</div>


@endsection

@push("js")
	<script src="/js/home/home.js" charset="utf-8"></script>
@endpush