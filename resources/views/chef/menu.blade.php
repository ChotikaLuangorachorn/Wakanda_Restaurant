@extends('layouts.chef')

@section('page-title')

		<h1> เมนูอาหาร</h1>
@endsection
@push('css')
<style>
.my-class {
   font-size: 1.6em;
}
th {
	cursor: pointer;
}
/* .container {
  background-color: white;
} */
</style>
@endpush

@section('content')
<div class="row">
    <div class="col-md-5">
        <div class="card border-primary mb-3" style="max-width: 100%;" >
            <div class="card-header">Sell</div>
                <div class="card-body" >
                    @foreach($menus as $menu)
                     
                        <div class="card border-primary mb-3 .d-inline-block" style=" display: inline-block; width: 45%; margin-right: 2%;" >
                            <div class="card-header">{{$menu->name}}</div>
                            <div class="card-body">
                            @if ($menu->image_path!='')
						        <div id='img-menu' style="width: 100%;height: 150px;background: url(/images/menu/{{$menu->image_path}});background-repeat: no-repeat;background-size: cover;background-position: center">
						        </div>
						    @else
						        <div id='img-menu' style="width: 100%;height: 150px;background: url(/images/menu/no_image.jpg);background-repeat: no-repeat;background-size: cover;background-position: center">
						        </div>
						    @endif


                            </div>
                        </div>
                    @endforeach
                </div>
                    
                    

        

                    


                        
               
        </div>
    </div>


    <div class="col-md-2">
    <i class="fas fa-arrow-alt-circle-right"></i>
    </div>


    <div class="col-md-5">
        <div class="card border-primary mb-3" style="max-width: 100%;" >
            <div class="card-header">Not sell</div>
            <div class="card-body">
                <h4 class="card-title">Primary card title</h4>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
        </div>
      
    </div>
</div>



@endsection