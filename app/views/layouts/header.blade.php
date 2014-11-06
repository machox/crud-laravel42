<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html" charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">

    <title>TechGrid Task</title>

    <link href="{{asset('assets/css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/bootstrap-theme.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/custom.css')}}" rel="stylesheet">

    <script src="{{asset('assets/js/jquery-1.11.1.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.js')}}"></script>
</head>
<body>
<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
  <div class="container">
  <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="{{route('people')}}">TechGrid Task</a>
    </div>
    <p class="navbar-text navbar-right">@if(Auth::check())Welcome {{ Auth::user()->username }} | <a href="{{route('logout')}}" class="navbar-link">Sign Out</a>@else<a href="{{route('login')}}" class="navbar-link">Sign In</a>@endif</p>
  </div>
</nav>
<div class="container-fluid">
    @yield('body')
    @include('layouts.footer')
    @yield('script-end')
</div>
</body>
</html>
