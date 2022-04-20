@extends('layout')
@section ('content')
<div class="row">
  <div class="col-sm-3"></div>
  <div class="col-sm-6">
    <div class="panel panel-info">
      <div class="panel-heading"><h2>Login</h2></div>
      <div class="panel-body">

    @if(Session::has('success'))
    <div class="panel panel-success"><div class="panel-heading">
    <div class="row">
      <div class="col-md-12">
        <div class="alert-success">
          {{Session::get('success')}}
        </div>
      </div>
    </div>
    </div></div>
    @endif
    @if(Session::has('failed'))
    <div class="panel panel-danger"><div class="panel-heading">
    <div class="row">
      <div class="col-md-12">
        <div class="alert-danger">
          {{Session::get('failed')}}
        </div>
      </div>
    </div>
    </div></div>
    @endif
      <form action="login_action" method="post">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <div class="form-group">
          <label for="email">Email:</label>
          <input type="email" name="email" class="form-control" id="email" placeholder="Enter email" name="email">
          @if($errors->has('email')) <p style='color:red;'>{{$errors->first('email')}}<p> @endif
        </div>
        <div class="form-group">
          <label for="pwd">Password:</label>
          <input type="password" name="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
          @if($errors->has('password')) <p style='color:red;'>{{$errors->first('password')}}<p> @endif
        </div>
        <button type="submit" class="btn btn-default">Login</button>
      </form>
      </div>
    </div>
  </div>
  <div class="col-sm-3"></div>
</div>
@endsection




