<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id(); // автоинкрементальный первичный ключ
            $table->unsignedBigInteger('user_id'); // например, ID пользователя
            $table->decimal('total_price', 10, 2); // сумма заказа
            $table->timestamps(); 
            $table->string('name');
            $table->string('email');
            $table->string('phone');// created_at и updated_at
            // добавьте другие нужные поля
        });
    }

    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
