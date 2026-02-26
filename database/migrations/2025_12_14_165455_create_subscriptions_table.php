<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Выполняет миграцию вверх (создание таблицы).
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();                      // Первичный ключ
            $table->string('email')->unique(); // Уникальный email
            $table->timestamp('subscribed_at'); // Дата подписки
            $table->timestamps();              // created_at и updated_at
        });
    }

    /**
     * Выполняет откат миграции (удаление таблицы).
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('subscriptions');
    }
};