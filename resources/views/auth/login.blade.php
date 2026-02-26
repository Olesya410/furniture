@extends('layouts.add')

@section('title', 'Вход')


@section('content')

<div class="forma-entrance">
    <form method="POST"  action="{{ route('auth.login') }}">
        @csrf
        <h1>Вход в аккаунт</h1>
        <label>Email:</label>
        <input type="email" name="email" required>
        <label>Password:</label>
        <input type="password" name="password" required>
        <button type="submit">Войти</button>
        @if ($errors->has('email'))
            <div class="error">{{ $errors->first('email') }}</div>
        @endif
        <p>У вас ещё нет аккаунта? <a href="{{ route('register') }}">Зарегистрироваться</a></p>
    </form>
</div>
@endsection