
    @extends('layouts.add')

    @section('title', 'Главная')

    @section('content')
    <div class="Contener">

        <div class="grid-container">
            @foreach($banners as $banner)
                <div class="banner">
                    <div class="img">
                        <img src="{{ asset('storage/' . $banner->image_path) }}" alt="{{ $banner->title }}">
                    </div>
                    <div class="text-banner">
                        <div class="banner-text">
                            <h1>{{ $banner->title }}</h1>
                        </div>
                        <button class="banner-button"><a href="{{ url('catalog') }}">Каталог</a></button>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="catalog">
            <!-- Категории -->
            <div class="blok_catalog">
                <div class="text_blok">
                    <h2>Каталог</h2>
                </div>

                <!-- Товары -->
                <div class="blok_product_popular">
                    <div class="products-grid">
                        @foreach ($blok_product_popular->take(3) as $product)
                        <div class="product-card">
                            <img src="{{ asset('storage/photos/' . $product->img) }}" alt="{{ $product->image_name }}">
                            <div class="Blok_Text_Information">
                                <div class="blok_name_product">
                                    <h1>{{$product->name }}</h1>
                                </div>
                                <h2>Новая цена: {{ $product->price }} р <span class="old_pride">Старая: {{ $product->price_old }} р</span></h2>
                                <div class="blok_size_product">
                                    <p>Размер</p>
                                    <div class="sezi_product">{{ $product->product_size }}</div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="blok_product_popular_button">
                        <button type="button"><a href="{{ url('catalog') }}">Все товары</a></button>
                    </div>
                </div>
            </div>

            {{-- О нас --}}
            <div class="adout">
                <h2>О нас</h2>
                <div class="blok-adout">
                    <div class="blok-adout-text-img">
                        <img class="image" src="storage/photos/adout.jpg">
                        <div class="blok-adout-text">
                            <h2 class="heading">ComfortCraze</h2>
                            <p class="description">Мы предлагаем вашему вниманию современную и стильную мебель,<br> разработанную нашими дизайнерами с учетом последних тенденций рынка.<br>Наша цель — создать продукцию высокого качества, функциональную и эстетичную одновременно.</p>
                            <ul class="list">
                                <li class="list-item-bold">Экологические стандарты</li>
                                <li class="list-item-normal">Используем исключительно экологически чистые материалы, заботимся о здоровье наших клиентов и окружающей среде.</li>
                                <li class="list-item-bold">Качество материалов</li>
                                <li class="list-item-normal">Работаем с европейскими поставщиками тканей и комплектующих, обеспечивая надежность каждого изделия.</li>
                                <li class="list-item-bold">Строгий контроль качества</li>
                                <li class="list-item-normal">Каждый этап производственного процесса проходит тщательную проверку, начиная от выбора сырья и заканчивая финальной сборкой.</li>
                                <li class="list-item-bold">Индивидуальный подход</li>
                                <li class="list-item-normal">Наши дизайнеры рассматривают интерьер как пространство творчества и самовыражения, предлагая решения, подчеркивающие индивидуальность вашего дома.</li>
                            </ul>
                        </div><br>
                    </div>
                </div>
            </div>

            {{-- Подписка --}}
            <div class="main-content">
                <div class="subscription-container">
                    <div class="subscription-content">
                        <h1>Хотите получать всю информацию о скидках и акциях одними из первых?</h1>
                        <p>Подпишитесь на нашу рассылку новостей.</p>
                        @if(session('success_message'))
                            <div class="alert alert-success">
                                {{ session('success_message') }}
                            </div>
                        @endif
                    </div>
                    <div class="subscription-form">
                        <p>Ваш e-mail</p>
                        <form method="POST" action="{{ route('subscribe') }}">
                            @csrf
                            <input type="email" name="email" placeholder="Введите ваш email" required />
                            <button type="submit">Подписаться</button>
                        </form>
                        <p style="font-size:12px; margin-top:8px;">Подписываясь на рассылку, я принимаю условия Политики конфиденциальности</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection