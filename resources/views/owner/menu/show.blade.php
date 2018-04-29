@extends('layouts.owner')

@section('page-title')
	<p>ข้อมูลอาหาร</p>
@endsection

@section('content')
	<div class="row">
		
	</div>
  <div class="">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h2>{{ $menu->name }}</h2>
        <p>[ <i class="fas fa-utensils"></i>
           {{ App\Category::findOrNew($menu->category_id)->name }} ]
        </p>
      </div>
      @if ($menu->image_path!='')
		    <div id='img-menu' style="width: 50%;height: 250px;background: url(/images/menu/{{$menu->image_path}});background-repeat: no-repeat;background-size: cover;background-position: center">
        </div>
        <br>
	    @endif
      <ul class="list-group">
        <li class="list-group-item">ชื่อ: {{ $menu->name }}</li>
        <li class="list-group-item">ประเภท: {{ App\Category::findOrNew($menu->category_id)->name }}</li>
        <li class="list-group-item">
            สถานะ: 
            @if ($menu->status == 'sell')
                กำลังขาย
            @else
                ไม่เปิดขาย
            @endif
        </li>
        <li class="list-group-item">ราคา: {{ $menu->price }} บาท</li>
        <li class="list-group-item">
          เพิ่มตั้งแต่: {{ $menu->created_at->diffForHumans() }}
        </li>
      </ul>
      <br>
      <div class="panel-footer">
        {{--@if (Auth::user()->can('update',$user))--}}
          <div class="form-group">
            <a href="/menus/{{ $menu->id }}/edit" class="btn btn-info">แก้ไข</a>
          </div>
        {{--@endif--}}
        <br>
	      <form action="/menus/{{ $menu->id }}" method="POST">
		      @csrf @method('DELETE')
		      <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
		        ลบเมนูนี้
		      </button>
		      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			      <div class="modal-dialog" role="document">
				      <div class="modal-content">
					      <div class="modal-header">
						      <h5 class="modal-title" id="exampleModalLabel">ยืนยันการลบ</h5>
						        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				              <span aria-hidden="true">&times;</span>
			              </button>
					      </div>
					      <div class="modal-body">
						      แน่ใจหรือไม่ที่จะลบเมนู: {{ $menu->name }} 
					      </div>
					      <div class="modal-footer">
						      <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
						      <button type="submit" class="btn btn-primary">ลบ</button>
					      </div>
				      </div>
			      </div>
		      </div>
	      </form>
      </div>
    </div>
    <div class="panel-footer">
      <br>
      <br>
    </div>
  </div>
@endsection
