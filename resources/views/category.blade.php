@extends('layouts.add')

@section('title', 'Каталог')

@section('content')
<a href="{{ route('catalog') }}">
    <img src="{{ asset('storage/photos/back.png') }}" alt="Назад" style="height:30px; width:30px; margin-top:5px; margin-left:10px;">
</a>
<div class="container-catalog">
    <h1>Товары </h1>
    <div class="cards-grid">
        @foreach ( $category as $product)
            <div class="col">
                <div class="card shadow-sm">
                    <a href="{{ route('product.show', $product->id) }}">
                        <img src="{{ asset('storage/photos/' . $product->img) }}"
                            alt="{{ $product->name }}"
                            class="card-img-top"
                            style="height: 200px; object-fit: cover;"
                        />
                    </a>
                    <h2>{{ $product->name }}</h2>
                    <form action="{{ route('cart.add', ['product' => $product->id]) }}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-success">Добавить в корзину</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection