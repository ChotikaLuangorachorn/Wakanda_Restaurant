@extends('layouts.owner')

@section('page-title')
	<p>ข้อมูลพนักงาน</p>
@endsection

@section('content')
	<div class="row">
		
	</div>
  <div class="">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h2>{{ $user->nickname }}</h2>
        <p>[ <i class="fa fa-user-circle"></i>
           {{ $user->role }} ]
        </p>
      </div>
      @if ($user->image_path!='')
		    <div id='img-profile' style="width: 200px;height: 250px;background: url(/images/profile/{{$user->image_path}});background-repeat: no-repeat;background-size: cover;background-position: center">
        </div>
        <br>
	    @endif
      <ul class="list-group">
        <li class="list-group-item">ชื่อ: {{ $user->firstname }}</li>
        <li class="list-group-item">นามสกุล: {{ $user->lastname }}</li>
        <li class="list-group-item">ชื่อเล่น: {{ $user->nickname }}</li>
        <li class="list-group-item">Email: {{ $user->email }}</li>
        <li class="list-group-item">ตำแหน่ง: {{ $user->role }}</li>
        <li class="list-group-item">
          เป็นพนักงานตั้งแต่: {{ $user->created_at->diffForHumans() }}
        </li>
      </ul>
      <br>
      <div class="panel-footer">
        {{--@if (Auth::user()->can('update',$user))--}}
          <div class="form-group">
            <a href="/users/{{ $user->id }}/edit" class="btn btn-info">แก้ไขพนักงาน</a>
          </div>
        {{--@endif--}}
        <br>
	      <form action="/users/{{ $user->id }}" method="POST">
		      @csrf @method('DELETE')
		      <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
		        ลบพนักงาน
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
						      คุณแน่ใจหรือไม่ที่จะลบพนักงาน: {{ $user->firstname }} {{ $user->lastname }}
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
