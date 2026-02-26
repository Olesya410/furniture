@extends('layouts.add')

@section('title', 'Регистрация')

@section('content')
<div class="forma-entrance">
    <form method="POST" action="{{ route('register') }}" style="margin-top: 30px;">
            @csrf
            <h1>Регистрация</h1>
            <label>Ваше имя</label>
            <input type="text" name="name" required><br>

            <label>Email:</label>
            <input type="email" name="email" required><br>

            <label>Пароль:</label>
            <input type="password" name="password" required><br>

            <label>Повтор пароля:</label>
            <input type="password" name="password_confirmation" required><br>

            <button type="submit">Зарегистрироваться</button>
            <p>У вас уже есть аккаунт? <a href="{{ route('auth.login') }}">Войти</a></p>
        </form>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
</div>
@endsection