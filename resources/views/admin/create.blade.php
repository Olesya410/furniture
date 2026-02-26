@extends('layouts.admin')

@section('content')

<h3>Добавить новый товарыыыыыы</h3>
<form action="{{ route('store.product') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div>
        <label>Название:</label>
        <input type="text" name="name" required>
    </div>
    <div>
        <label>Описание:</label>
        <textarea name="description"></textarea>
    </div>
    <div>
        <label>Цена:</label>
        <input type="number" name="price" min="0" step="0.01" required>
    </div>
    <div>
        <label>Фото:</label>
        <input type="file" name="photo" accept="image/*" required>
    </div>
    <div>
        <label>Имя изображения:</label>
        <input type="text" name="img_name">
    </div>
    <div>
        <label>Старая цена:</label>
        <input type="number" name="price_old" min="0" step="0.01">
    </div>
    <div>
        <label>Размер продукта:</label>
        <input type="text" name="product_size">
    </div>
    <div>
        <label>Каталог ID:</label>
        <input type="number" name="catalog_id" min="1">
    </div>
    <button type="submit">Добавить товар</button>
</form>
@endsection