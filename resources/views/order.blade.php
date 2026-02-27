@extends('layouts.add')

@section('title', 'Оформление заказа')

@section('content')
<div class="container my-5">
    <h1 class="section-title mb-4 text-center">Оформление заказа</h1>

    <form action="{{ route('order.submit') }}" method="POST">
    @csrf
        
    <div class="mb-3">
        <label for="name" class="form-label">Имя</label>
        <input type="text" class="form-control" id="name" name="name" required>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" required>
    </div>
    <div class="mb-3">
        <label for="phone" class="form-label">Телефон</label>
        <input type="tel" class="form-control" id="phone" name="phone" required>
    </div>
    <div class="mb-3">
        <label for="address" class="form-label">Адрес</label>
        <input type="address" class="form-control" id="address" name="address" required>
    </div>

    @foreach($cartItems as $item)
        <input type="hidden" name="selected_products[]" value="{{ $item->product_id }}">
    @endforeach

    <button type="submit" class="btn btn-primary">Подтвердить заказ</button>
</form>
</div>
@endsection
