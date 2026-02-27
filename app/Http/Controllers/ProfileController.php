<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function update(Request $request)
    {
        $user = Auth::user();

        if ($request->input('action') === 'profile') {
            $request->validate([
                'email' => 'required|email',
                'name' => 'required|string|max:255',
            ]);
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->save();
            return redirect()->back()->with('success', 'Профиль обновлен');
        }
        return redirect()->back()->with('error', 'Некорректное действие');
    }

}
