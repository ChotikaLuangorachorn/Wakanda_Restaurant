@extends('layouts.owner')

@section('page-title')
  <p>รายชื่อพนักงานทั้งหมด</p>
  <input id="searchInput" type="text" placeholder="ค้นหา..">
@endsection

@section('content')
	<div class="row">
		
    <table class="table table-hover">
      <thead class="thead-dark">
        <tr>
          <th scope="col">#</th>
          <th scope="col">ชื่อเล่น</th>
          <th scope="col">ชื่อ</th>
          <th scope="col">นามสกุล</th>
          <th scope="col">ตำแหน่ง</th>
        </tr>
      </thead>
      <tbody id="userTable">
        @foreach($users as $user)
          <tr class="table-light">
            <th scope="row">{{ $loop->iteration }}</th>
            <td>
              <a href="{{ url('/users/' . $user->id) }}">
                {{ $user->nickname }}
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
  	   <a class="btn btn-info" href="{{ url('/users/create') }}">เพิ่มพนักงานใหม่</a>
     </div>

	</div>
@endsection

@push('js')
  <script>
    $(document).ready(function(){
      $("#searchInput").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#userTable tr").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });
    });  
  </script>
@endpush
