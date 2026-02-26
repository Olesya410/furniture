@extends('layouts.add')

@section('title', 'Заказ успешно оформлен')

@section('content')
<div class="container my-5 text-center">
    <h1>Спасибо за заказ!</h1>
    <p>Ваш заказ №{{ $order->id }} успешно оформлен.</p>
    <a href="{{ route('home') }}">Вернуться на главную</a>
</div>
@endsection