@extends('layouts.add')

@section('title', 'Каталог')

@section('content')
<div class="container-garantee">
    <div class="info-garantee">
        <h1>Гарантии и возврат</h1>
        <ul>
            <li><a href="{{ route('guarantees') }}">Гарантия</a></li>
            <li><a href="{{ route('delivery_pay') }}">Доставка и оплата</a></li>
            <li><a href="{{ route('installment') }}">Рассрочка</a></li>
        </ul>
    </div>
    <div class="info-blok-garantees">
        <h1>Гарантия</h1>
        @foreach ($garantees as $info_garant )
            <div class='content_garant'>  
                <h2>{{ $info_garant->title }}</h2>
                <p>{{$info_garant->content}}</p>
            </div>
        @endforeach
        <h1>Возврат товара из наличия</h1>
        @foreach ($product_return as $info_product_return )
            <div class='content_product_return'>  
                <h2>{{ $info_product_return->title }}</h2>
                <p>{{$info_product_return->content}}</p>
            </div>
        @endforeach

    </div>
</div>
@endsection

