@extends('layouts.add')

@section('title', 'Профиль пользователя')

@section('content')
<div class="profil" style="margin-top: 9px;">
    <div class="photo-user">
        <!-- Тут будет отображаться выбранное фото -->
        <img id="main-profile-photo" src="{{ asset('storage/photos/user1.jpg') }}" alt="Фото профиля" style="height:100%; width:300px;">
    </div>
    <h1>Добро пожаловать, {{ $user->name }}!</h1>
    <p>Email: {{ $user->email }}</p>
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit">Выйти</button>
    </form>
    <div class="photo-profile">
        <h2 style="margin-top: 20px; margin-bottom:20px;">Фото профиля</h2>
        <!-- Клики по фото -->
        <div class="photos-selection" >
            <img src="{{ asset('storage/photos/user1.jpg') }}" alt="Фото 1" style="height:100%; width:90px; border: 3px solid black; cursor:pointer;" class="select-photo" data-src="{{ asset('storage/photos/user1.jpg') }}">
            <img src="{{ asset('storage/photos/user2.jpg') }}" alt="Фото 2" style="height:100%; width:90px; border: 3px solid black; cursor:pointer;" class="select-photo" data-src="{{ asset('storage/photos/user2.jpg') }}">
            <img src="{{ asset('storage/photos/user3.jpg') }}" alt="Фото 3" style="height:100%; width:90px; border: 3px solid black; cursor:pointer;" class="select-photo" data-src="{{ asset('storage/photos/user3.jpg') }}">
            <img src="{{ asset('storage/photos/user4.jpg') }}" alt="Фото 4" style="height:100%; width:90px; border: 3px solid black; cursor:pointer;" class="select-photo" data-src="{{ asset('storage/photos/user4.jpg') }}">
            <img src="{{ asset('storage/photos/user5.jpg') }}" alt="Фото 5" style="height:100%; width:90px; border: 3px solid black; cursor:pointer;" class="select-photo" data-src="{{ asset('storage/photos/user5.jpg') }}">
        </div>
    </div>

    <!-- Поле для хранения выбранного фото -->
    <input type="hidden" name="profile_photo" id="profile-photo-input" value="{{ asset('storage/photos/user1.jpg') }}">

    <!-- Форма для редактирования имени и email -->
    <form action="{{ route('profile.update') }}" method="POST" style="margin-top:20px;">
        @csrf
        @method('PUT')
        <input type="hidden" name="action" value="profile">
        <fieldset>
            <legend>Редактировать профиль</legend>
            <label for="email">Почта:</label>
            <input type="email" id="email" name="email" required value="{{ $user->email }}">
            <label for="name">Имя:</label>
            <input type="text" id="name" name="name" required value="{{ $user->name }}">
            <button type="submit">Сохранить профиль</button>
        </fieldset>
    </form>


<!-- Скрипт для выбора фото -->
<script>
    document.querySelectorAll('.select-photo').forEach(img => {
        img.addEventListener('click', () => {
            const src = img.getAttribute('data-src');
            // Обновляем главное фото
            document.getElementById('main-profile-photo').src = src;
            // Записываем выбранное фото в скрытое поле
            document.getElementById('profile-photo-input').value = src;

            // Обводка выбранного фото
            document.querySelectorAll('.select-photo').forEach(i => i.style.border = '3px solid black');
            img.style.border = '3px solid red';
        });
    });
</script>
@endsection