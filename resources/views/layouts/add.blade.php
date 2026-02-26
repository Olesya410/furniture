<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8" />
    <title>@yield('title', 'Мой сайт')</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="icon" href="{{ asset('favicon.ico') }}"  type="image/x-icon">
</head>
<body>
    @include('partials.header') {{-- шапка --}}
    
    <div class="main-content">
        @yield('content')
    </div>
    
    @include('partials.footer') {{-- подвал --}}
</body>
</html>