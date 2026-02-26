@extends('layouts.add')

@section('title', 'Каталог')

@section('content')
<div class="container-catalog">
    <h1>Каталог</h1>
    <div class="cards-grid">
        @foreach ($products as $product)
            <div class="col">
                <div class="card shadow-sm">
                    <a href="{{ route('category.show', ['id' => $product->id]) }}">
                        <img src="{{ asset('storage/' . $product->img) }}"
                            alt="{{ $product->name }}"
                            class="card-img-top"
                            style="height: 200px; object-fit: cover;"
                        />
                    </a>

                    <div class="card-body d-flex justify-content-center align-items-center">
                        <h5 class="card-title m-0">{{ $product->name }}</h5>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection

