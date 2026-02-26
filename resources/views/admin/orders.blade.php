@extends('layouts.admin') 

@section('content')
     <main class="main-content">
            <!-- Последние заказы -->
           <div class="infa-orders">
        <section class="recent-orders">
            <h2>Заказы:</h2>
            @foreach ($orders as $order)
                <div class="order-block">
                    <div class="order-card" style="margin-top:20px;">
                        <h3>Заказ №{{ $loop->iteration }}</h3>
                        <div class="order-details">
                            <p><b>Почта:</b> <span class="infa-order-details">{{$order->email}}</span></p>
                            <p><b>Адрес:</b> <span class="infa-order-details">Город: Ижевск, Улица: {{$order->address}}</span></p>
                            <p><b>Status:</b> <span class="infa-order-details">Оформлен</span></p>
                        </div>
                    </div>
                    
                    <!-- Товары в заказе -->
                    <div class="order-items">
                        <h4>Товары в заказе:</h4>
                        <table>
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Product Name</th>
                                    <th>Price</th>
                                    <th>Дата добавления</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($order->orderItems as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->product->name }}</td>
                                        <td>{{ $item->price }}</td>
                                        <td>{{ $item->created_at }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                @endforeach
            </section>
        </div>
        </main>
    </div>
</div>

@endsection