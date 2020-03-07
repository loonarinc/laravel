<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Страница@section('title')@show</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
@yield('menu')
<header>
    <div class="jumbotron">
        <h1 class="display-5">Новостной сайт на Laravel</h1>
    </div>
</header>

<div class="container" style="min-height: 100vh;">
@yield('content')
</div>
<nav class="navbar fixed-bottom navbar-dark bg-dark">
    <span class="navbar-brand mx-auto">Copyright &copy; 2020</span>
</nav>
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
