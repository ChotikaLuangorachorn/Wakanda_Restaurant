@extends('layouts.owner')

@section('page-title')
  <p>รายการอาหารทั้งหมด</p>
  <input id="searchInput" type="text" placeholder="ค้นหา..">
@endsection

@section('content')
	<div class="row">
    <table class="table table-hover">
      <thead class="thead-dark">
        <tr>
          <th scope="col">#</th>
          <th scope="col">ชื่อ</th>
          <th scope="col">ประเภท</th>
          <th scope="col">ราคา</th>
          <th scope="col">สถานะ</th>
        </tr>
      </thead>
      <tbody id="menuTable">
        @foreach($menus as $menu)
          <tr class="table-light">
            <th scope="row">{{ $loop->iteration }}</th>
            <td>
              <a href="{{ url('/menus/' . $menu->id) }}">
                {{ $menu->name }}
              </a>
            </td>
            <td>{{ App\Category::findOrNew($menu->category_id)->name }}</td>
            <td>{{ $menu->price }} บาท</td>
            <td>
              @if ($menu->status == 'sell')
                กำลังขาย
              @else
                ไม่เปิดขาย
              @endif
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>

    <div class="">
  	   <a class="btn btn-info" href="{{ url('/menus/create') }}">เพิ่มเมนูใหม่</a>
     </div>

	</div>
@endsection

@push('js')
  <script>
    $(document).ready(function(){
      $("#searchInput").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#menuTable tr").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });
    });  
  </script>
@endpush




