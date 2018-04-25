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
    <div class="panel panel-default">
      <div class="panel-heading">
        <h2>{{ $user->email }}</h2>
        <p>[ <i class="fa fa-user-circle"></i>
           {{ $user->role }} ]
        </p>
      </div>
      <ul class="list-group">
        <li class="list-group-item">First Name: {{ $user->firstname }}</li>
        <li class="list-group-item">Last Name: {{ $user->lastname }}</li>
        <li class="list-group-item">Email: {{ $user->email }}</li>
        <li class="list-group-item">Role: {{ $user->role }}</li>
        <li class="list-group-item">
          Joining Since: {{ $user->created_at->diffForHumans() }}
        </li>
      </ul>
      <br>
      <div class="panel-footer">
        {{--@if (Auth::user()->can('update',$user))--}}
          <div class="form-group">
            <a href="/users/{{ $user->id }}/edit" class="btn btn-info">Edit</a>
          </div>
        {{--@endif--}}
        <br>
	      <form action="/users/{{ $user->id }}" method="POST">
		      @csrf @method('DELETE')
		      <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
		        DELETE this staff
		      </button>
		      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			      <div class="modal-dialog" role="document">
				      <div class="modal-content">
					      <div class="modal-header">
						      <h5 class="modal-title" id="exampleModalLabel">Delete confirmation</h5>
						        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				              <span aria-hidden="true">&times;</span>
			              </button>
					      </div>
					      <div class="modal-body">
						      Are you sure to delete staff: {{ $user->firstname }} {{ $user->lastname }}
					      </div>
					      <div class="modal-footer">
						      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						      <button type="submit" class="btn btn-primary">DELETE</button>
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
