@extends('layouts.admin')

@section('content')


<h2>Пользователи</h2>

<!-- Форма для добавления нового пользователя -->
<h3>Добавить нового пользователя</h3>
<form action="{{ route('create.user') }}" method="POST">
    @csrf
    <div>
        <label>Имя:</label>
        <input type="text" name="name" required>
    </div>
    <div>
        <label>Email:</label>
        <input type="email" name="email" required>
    </div>
    <div>
        <label>Пароль:</label>
        <input type="password" name="password" required>
    </div>
    <div>
        <label>Подтверждение пароля:</label>
        <input type="password" name="password_confirmation" required>
    </div>
    <button type="submit">Добавить пользователя</button>
</form>

<!-- Таблица пользователей -->
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Email</th>
            <td>Имя</td>
            <td>Роль</td>
            <th>Действия</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->email }}</td>
            <td>{{$user->name }}</td>
            <td>{{$user->role_id }}</td>
            <td>
                <!-- Форма удаления пользователя -->
                <form action="{{ route('delete.user', $user->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="delete-btn" onclick="return confirm('Удалить этого пользователя?')">Удалить</button>
                </form>
            </td>
            
        </tr>
        @endforeach
    </tbody>
</table>
@endsection