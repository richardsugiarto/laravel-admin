<!DOCTYPE html>
<html lang="en">
<head>
  <title>GoArticle</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
  <script src="{{ asset('js/jquery.min.js') }}"></script>
  <script src="{{ asset('js/bootstrap.min.js') }}"></script>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="{{URL::to('/')}}">GoArticle</a>
    </div>
    <ul class="nav navbar-nav">
      @if(Auth::user())
        <li class=""><a href="{{URL::to('/post_article')}}">Post</a></li>
        <li class=""><a href="{{URL::to('/my_article')}}">My Articles</a></li>
        
      @endif
      <li class=""><a href="{{URL::to('/all_article')}}">Browse</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      
      @if(Auth::user())
      <li><a href="{{URL::to('/logout')}}"><span style="color:white">Hi,{{ucwords(Auth::user()->name)}}</span>  <span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
      @else
      <li><a href="{{URL::to('/register')}}"><span class="glyphicon glyphicon-user"></span> Register</a></li>
      <li><a href="{{URL::to('/login')}}"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      @endif
    </ul>
  </div>
</nav>
  
<div class="container">
  @yield('content')
</div>

</body>
</html>
