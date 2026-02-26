<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8" />
    <title>@yield('title', 'Мой сайт')</title>
    <link rel="stylesheet" href="{{ asset('css/style1.css') }}">
    <link rel="icon" href="{{ asset('favicon.ico') }}"  type="image/x-icon">
</head>
<body>
    <div class="wrapper">
    @include('partials.header1') {{-- шапка админка --}} 
    
    <div class="main-content">
        @yield('content')
    </div>
</body>
</html>