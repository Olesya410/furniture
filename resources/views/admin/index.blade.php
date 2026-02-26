@extends('layouts.admin')

@section('content')
<main class="main-content">
    <!-- Статистика -->
    <section class="statistics">
        <div class="quantity">
            <div class="block-infa">Общее количество пользователей: {{$TotalUsers}}</div>
            <div class="block-infa">Общее количество товаров: {{$TotalProducts}}</div>
            <div class="block-infa">Общее количество заказов: {{$TotalOrders}}</div>
        </div>
    </section>

    <h2>Статистика продаж</h2>
    <canvas id="salesChart" width="400" height="200"></canvas>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
    const ctx = document.getElementById('salesChart').getContext('2d');
    const salesChart = new Chart(ctx, {
        type: 'bar', // или 'bar', 'pie' и др.
        data: {
            labels: ['Янв', 'Фев', 'Мар', 'Апр', 'Май', 'Июн', 'Июл'],
            datasets: [{
                label: 'Продажи',
                data: [30, 50, 40, 70, 60, 80, 100],
                backgroundColor: 'rgba(52, 152, 219, 0.2)',
                borderColor: 'rgba(52, 152, 219, 1)',
                borderWidth: 2,
                fill: true,
                tension: 0.4
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
    </script>
    <!-- Заказы -->
    <div class="infa-orders">
        <section class="recent-orders">
            <h2>Заказы:</h2>
            @foreach ($orders as $order)
                <div class="order-block">
                    <div class="order-card" style="margin-top:20px;">
                        <h3>Заказ №{{ $loop->iteration }}</h3>
                        <div class="order-details">
                            <p><b>Почта:</b> <span class="infa-order-details">{{$order->email}}</span></p>
                            <p><b>Адрес:</b> <span class="infa-order-details">Город: Ижевск, Улица: Тимирязева 34, Подъезд:4, Квартира: 114</span></p>
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
@endsection