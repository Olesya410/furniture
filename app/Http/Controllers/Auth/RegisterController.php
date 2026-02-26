<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class RegisterController extends Controller
{
     public function showRegistrationForm()
    {
        return view('auth.register');
    }

    // Обработка регистрации
    public function register(Request $request)
    {
        // Валидация данных
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ], [
            'name.required' => 'Пожалуйста, введите ваше имя.',
            'name.max' => 'Имя не должно превышать 255 символов.',
            'email.required' => 'Пожалуйста, введите email.',
            'email.email' => 'Пожалуйста, введите корректный email.',
            'email.unique' => 'Этот email уже зарегистрирован.',
            'password.required' => 'Пожалуйста, введите пароль.',
            'password.min' => 'Пароль должен содержать не менее 6 символов.',
            'password.confirmed' => 'Пароли не совпадают.',
        ]);

        // Создание пользователя
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Перенаправление после регистрации
        return redirect('/register')->with('success', 'Вы успешно зарегистрировались!');
    }
}
