@extends('layouts.add')

@section('title', 'Корзина')

@section('content')
<div class="container my-5">
    <h1 class="section-title mb-5 text-center" style="margin-top: 30px;">Корзина</h1>

    <!-- Таблица с товарами -->
    <div class="table-responsive mb-5">
        <table class="cart-table" border="1" cellpadding="10" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>Изображение</th>
                    <th>Название</th>
                    <th>Цена</th>
                    <th>Количество</th>
                    <th>Общая цена</th>
                    <th>Действия</th>
                </tr>
            </thead>
            <tbody>
                @foreach($productsInCart as $product)
                <tr>
                    <!-- Изображение -->
                    <td>
                        @if($product->img)
                        <img src="{{ asset('storage/' . $product->img) }}" class="product-img" alt="{{ $product->name }}" width="80">
                        @else
                        <div class="no-image">Нет фото</div>
                        @endif
                    </td>
                    <!-- Название -->
                    <td>{{ $product->name }}</td>
                    <!-- Цена -->
                    <td>{{ number_format($product->price, 2) }} ₽</td>
                    <!-- Количество -->
                    <td>{{ $product->quantity }}</td>
                    <!-- Общая цена -->
                    <td>{{ number_format($product->total_price, 2) }} ₽</td>
                    <!-- Действия -->
                    <td>
                        <!-- Форма удаления товара -->
                        <form id="delete-form-{{ $product->id }}" action="{{ route('cart.remove', $product->id) }}" method="POST" style="display:inline;">
                            @csrf
                            <button type="submit" onclick="return confirm('Удалить этот товар?');">Удалить</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="4" class="text-right"><strong>Общая сумма:</strong></td>
                    <td colspan="2" class="total-sum">{{ number_format($total, 2) }} ₽</td>
                </tr>
            </tfoot>
        </table>
    </div>

    <!-- Форма для оформления заказа -->
    <form action="{{ route('order') }}" method="GET">
        @csrf
        <div class="order" style="text-align: center;">
            <button type="submit" style="font-size: 1.2em; padding: 10px 20px;">Оформить заказ</button>
        </div>
    </form>
</div>
@endsection