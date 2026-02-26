@extends('layouts.admin')

@section('content')

<h2>Товары</h2>

<!-- Форма для добавления нового товара -->
<h3><a href="{{ route('create.product') }}">Добавить новый товар</a></h3>

<!-- Таблица товаров -->
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Фото</th>
            <th>Название</th>
            <th>Описание</th>
            <th>Цена</th>
            <th>Действия</th>
        </tr>
    </thead>
    <tbody>
        @foreach($products as $product)
        <tr>
            <td>{{ $product->id }}</td>
            <td>
                @if($product->img)
                    <img src="{{ asset('storage/photos/' . $product->img) }}" alt="{{ $product->name }}" class="product-photo">
                @else
                    Нет фото
                @endif
            </td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->description }}</td>
            <td>{{ $product->price }}</td>
            <td>
                <!-- Форма удаления товара -->
                <form action="{{ route('delete.product', $product->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="delete-btn" onclick="return confirm('Удалить этот товар?')">Удалить</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection