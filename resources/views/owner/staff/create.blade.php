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
  <div class="jumbotron">
    <h2>Create new staff</h2>
    <p>Please fill all form.</p>
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
        <label for="firstname">First Name: </label>
        <input class="form-control" type="text" name="firstname" value="{{ old('firstname') }}">
      </div>

      <div class="form-group">
        <label for="lastname">Last Name: </label>
        <input class="form-control" type="text" name="lastname" value="{{ old('lastname') }}">
      </div>

      <div class="form-group">
        <label for="email">Email: </label>
        <input class="form-control" type="email" name="email" value="{{ old('email') }}">
      </div>

      <div class="form-group">
        <label for="password">Password: </label>
        <input class="form-control" type="password" name="password" value="{{ old('password') }}">
      </div>

      <div class="form-group">
        <label for="password_confirmation">Confirm Password: </label>
        <input class="form-control" type="password" name="password_confirmation" value="{{ old('password_confirmation') }}">
      </div>

      <div class="form-group">
        <label>Role: </label>
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
          <button type="submit" class="btn btn-success">Submit</button>
        </div>
        <div class="col-sm-6">
          <button type="reset" class="btn btn-danger">Reset</button>
        </div>
      </div>
    </form>
@endsection
