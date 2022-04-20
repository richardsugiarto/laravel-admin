@extends('layout')
@section ('content')
<div class="row">
  <div class="col-sm-3"></div>
  <div class="col-sm-6">
    <div class="panel panel-info">
    <div class="panel-heading"><h2>Register</h2></div>
    <div class="panel-body">
        <form action="register_action" method="post">
          <input type="hidden" name="_token" value="{{csrf_token()}}">
          <div class="form-group">
            <label for="name">Name:</label>
            <input type="name" name="name" class="form-control" id="name" placeholder="Enter name" >
            @if($errors->has('name')) <p style='color:red;'>{{$errors->first('name')}}<p> @endif
          </div>
          <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" class="form-control" id="email" placeholder="Enter email" >
            @if($errors->has('email')) <p style='color:red;'>{{$errors->first('email')}}<p> @endif
          </div>
          <div class="form-group">
            <label for="pwd">Password:</label>
            <input type="password" name="password" class="form-control" id="pwd" placeholder="Enter password" >
            @if($errors->has('password')) <p style='color:red;'>{{$errors->first('password')}}<p> @endif
          </div>
          <div class="form-group">
            <label for="pwd">Confirm Password:</label>
            <input type="password" name="cpassword" class="form-control" id="pwd" placeholder="Confirm password" >
            @if($errors->has('cpassword')) <p style='color:red;'>{{$errors->first('cpassword')}}<p> @endif
          </div>
          <button type="submit" class="btn btn-default">Register</button>
        </form>
    </div>
    </div>
  </div>
  <div class="col-sm-3"></div>
</div>
@endsection



