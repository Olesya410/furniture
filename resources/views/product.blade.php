@extends('layouts.add')

@section('title', 'Товары категории')

@section('content')
    <div class="product">
        <div class="product-image">
            <img src="{{ asset('storage/' . $product->img) }}" alt="{{ $product->img_name }}" />
        </div>

        <h1>{{ $product->name }}</h1>
        
        <div class="product-prices">
            <span class="new-price">Новая цена: {{ $product->price }}p</span>
            @if($product->price_old)
                <span class="old-price">Старая цена: {{ $product->price_old }}p</span>
            @endif
        </div>

        <div class="product-size">
            <label for="size">Размер</label>
            <p>{{ $product->product_size}}</p>
        </div>

        <div class="product-description">
            <h2>Описание</h2>
            <p>{{ $product->description }}</p>
        </div>

        <div class="col-md-6">
            <form action="{{ route('cart.add', ['product' => $product->id]) }}" method="post">
                @csrf
                <button type="submit" class="btn btn-success">Добавить в корзину</button>
            </form>
        </div>
    </div>
@endsection