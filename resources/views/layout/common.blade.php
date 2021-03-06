<?php$current=''; ?>

<!DOCTYPE html>
<html lang="{{app()->getLocale()}}">
<head>
  @section('head')
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{csrf_token()}}">

  <title>{{config('app.name', 'Laravel')}}@yield('title')</title>

  <link href="{{asset('css/app.css')}}" rel="stylesheet">
  <script src="{{asset('js/app.js')}}"></script>
  @show
</head>
<body>
  @yield('body')
</body>
</html>
