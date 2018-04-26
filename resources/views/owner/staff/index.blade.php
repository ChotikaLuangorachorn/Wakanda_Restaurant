@extends('layouts.owner')

@section('page-title')
	<p>รายชื่อพนักงานทั้งหมด</p>
@endsection

@section('content')
	<div class="row">
		<div class="col">
			<p>ตาราง แผนภาพ พวกยอดขาย อาหารยอดฮิต ...</p>
		</div>
    <table class="table table-hover">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Email</th>
          <th scope="col">First name</th>
          <th scope="col">Last name</th>
          <th scope="col">Role</th>
        </tr>
      </thead>
      <tbody>
        @foreach($users as $user)
          <tr class="table-dark">
            <th scope="row">{{ $loop->iteration }}</th>
            <td>
              <a href="{{ url('/users/' . $user->id) }}">
                {{ $user->email }}
              </a>
            </td>
            <td>{{ $user->firstname }}</td>
            <td>{{ $user->lastname }}</td>
            <td>{{ $user->role }}</td>
          </tr>
        @endforeach
      </tbody>
    </table>

    <div class="">
  	   <a class="button" href="{{ url('/users/create') }}">Add new staff</a>
     </div>

	</div>
@endsection
