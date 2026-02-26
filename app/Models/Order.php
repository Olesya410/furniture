<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    // Укажите поля, которые можно массово заполнять
    protected $fillable = [
        'user_id',
        'name',
        'email',
        'phone',
        'address',
        // добавьте другие поля по необходимости
    ];

    // Связь с позициями заказа
    public function items()
    {
        return $this->hasMany(CartItem::class);
    }

    // Связь с пользователем
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    // В модели Order.php
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class, 'order_id');
    }
}
