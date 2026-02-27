<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscription;

class SubscriptionController extends Controller
{
    public function store(Request $request)
    {
        $request->validate(['email' => 'required|email|unique:subscriptions']);
        Subscription::create(['email' => $request->input('email'), 'subscribed_at' => now()]);
        return back()->with('success_message', 'Спасибо за подписку!');
    }
}
