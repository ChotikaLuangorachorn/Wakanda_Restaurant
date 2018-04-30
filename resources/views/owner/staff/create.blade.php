@extends('layouts.owner')

@section('page-title')
	<p>เพิ่มพนักงานใหม่</p>
@endsection

@section('content')
	<div class="row">
		
	</div>
  <div class="jumbotron">
    <h2>เพิ่มพนักงานใหม่</h2>
    <p>โปรดกรอกทุกช่อง</p>
  </div>
  <div class="">
    <form class="" action="/users" method="post">
      @csrf
      @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif
      <div class="form-group">
        <label for="firstname">ชื่อ: </label>
        <input class="form-control" type="text" name="firstname" value="{{ old('firstname') }}">
      </div>

      <div class="form-group">
        <label for="lastname">นามสกุล: </label>
        <input class="form-control" type="text" name="lastname" value="{{ old('lastname') }}">
      </div>

      <div class="form-group">
        <label for="email">Email: </label>
        <input class="form-control" type="email" name="email" value="{{ old('email') }}">
      </div>

      <div class="form-group">
        <label for="password">รหัสผ่าน: </label>
        <input class="form-control" type="password" name="password" value="{{ old('password') }}">
      </div>

      <div class="form-group">
        <label for="password_confirmation">ยืนยันรหัสผ่าน: </label>
        <input class="form-control" type="password" name="password_confirmation" value="{{ old('password_confirmation') }}">
      </div>

      <div class="form-group">
        <label>ตำแหน่ง: </label>
        <select class="form-control" name="role">
          @foreach($roles as $key=>$value)
            @if(old('role') == $key)
              <option value="{{ $key }}" selected>{{ $value }}</option>
            @else
              <option value="{{ $key }}">{{ $value }}</option>
            @endif
          @endforeach
        </select>
      </div>

      <div class="form-group row">
        <div class="col-sm-6">
          <button type="submit" class="btn btn-success">ยืนยัน</button>
        </div>
        <div class="col-sm-6">
          <button type="reset" class="btn btn-danger">รีเซ็ต</button>
        </div>
      </div>
    </form>
@endsection
