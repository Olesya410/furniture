<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\User;     
use App\Models\Product;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function profile()
    {
        $user = Auth::user();
        return view('profile', ['user' => $user]);
    }

    public function user()
    {
        $user = Auth::user();
        return view('profile', compact('user'));
    }

    public function login(Request $request)
    {
        // Валидация данных
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Попытка входа
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $user = Auth::user();

            // Проверка роли
            if ($user->role_id == 2) {
                return redirect()->intended('/admin');
            }

            return redirect()->intended('/profile');
        }
        return back()->withErrors([
            'email' => 'Неправильные данные.',
        ])->withInput($request->only('email'));
    }


    public function logout(Request $request)
    {
        Auth::logout(); 
        $request->session()->invalidate(); 
        $request->session()->regenerateToken(); 

        return redirect('/login'); // Перенаправление на страницу входа
    }
}