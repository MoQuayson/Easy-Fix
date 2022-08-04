<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{asset('assets/images/logo.png')}}">
    <title>@yield('title')</title>

    @vite(['resources/css/app.css','resources/sass/app.scss', 'resources/js/app.js'])
    <link href="{{ asset('assets/css/auth.css') }}" rel="stylesheet">

</head>
<body>
    <main class="content container">
        @yield('content')
    </main>
</body>
</html>
