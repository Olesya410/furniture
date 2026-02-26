<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscription;

class SubscriptionController extends Controller
{
    public function store(Request $request)
    {
        // Валидируем введённый email
        $request->validate(['email' => 'required|email|unique:subscriptions']);

        // Создаём новую запись в базе данных
        Subscription::create(['email' => $request->input('email'), 'subscribed_at' => now()]);

        // Возвращаемся обратно на страницу с уведомлением
        return back()->with('success_message', 'Спасибо за подписку!');
    }
}