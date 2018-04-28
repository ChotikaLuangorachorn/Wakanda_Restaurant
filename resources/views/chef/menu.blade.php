@extends('layouts.chef')

@section('page-title')

		<h1> เมนูอาหาร</h1>
@endsection
@push('css')
<style>
.my-class {
   font-size: 1.6em;
}
i {
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
                <form id="form1" action="/chef/menus/{{$categoryNo}}" method="POST">
                    <div class="btn-group-toggle" data-toggle="buttons">
                    @csrf
                    @method('PUT')
                    @foreach($menus as $menu)
                        @if($categoryNo == $menu->category_id && $menu->status === 'sell')
                        <label for="menu{{$menu->id}}" class="btn btn-outline-success" style="display:inline-block;width: 45%;  margin-right: 2%; color:black">
                            <div class="card border-primary .d-inline-block">
                                <div class="card-header" >{{$menu->name}}</div>
                                <div class="card-body">
                                @if ($menu->image_path!='')
                                    <div id='img-menu' style="width: 100%;height: 130px;background: url(/images/menu/{{$menu->image_path}});background-repeat: no-repeat;background-size: cover;background-position: center">
                                    </div>
                                @else
                                    <div id='img-menu' style="width: 100%;height: 130px;background: url(/images/menu/no_image.jpg);background-repeat: no-repeat;background-size: cover;background-position: center">
                                    </div>
                                @endif

                                </div>
                            </div>
                            <input hidden type="radio" name="menu" id="menu{{$menu->id}}" value="{{$menu->id}}">
                        </label>
                        @endif
                    @endforeach
                    </div>
                </form>
                </div>
                    
                        
               
        </div>
    </div>


    <div class="col-md-2"  style="text-align:center;">
    <i class="fas fa-arrow-alt-circle-right th" onclick="$('#form1').submit();" style="font-size:100px; margin-top: 150px;"></i>
    </div>


    <div class="col-md-5">
        <div class="card border-primary mb-3" style="max-width: 100%;" >
            <div class="card-header">Not sell</div>
            <div class="card-body">
                @foreach($menus as $menu)
                    @if($categoryNo == $menu->category_id && $menu->status === 'not sell')
                        <div class="card border-primary mb-3 .d-inline-block" style=" display: inline-block; width: 45%; margin-right: 2%;" >
                            <div class="card-header" >{{$menu->name}}</div>
                            <div class="card-body">
                                @if ($menu->image_path!='')
                                <div id='img-menu' style="width: 100%;height: 130px;background: url(/images/menu/{{$menu->image_path}});background-repeat: no-repeat;background-size: cover;background-position: center">
                                    </div>
                                @else
                                    <div id='img-menu' style="width: 100%;height: 130px;background: url(/images/menu/no_image.jpg);background-repeat: no-repeat;background-size: cover;background-position: center">
                                    </div>
                                @endif

                            </div>
                        </div>

                    @endif
                @endforeach

                
            </div>
        </div>
      
    </div>
</div>



@endsection