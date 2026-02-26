<header class="header">
    <div class="header_container">
        <div class="logo"><a href="{{ route('home') }}">ComfortCraze</a></div>
        <nav>
            <ul>
                <li><a href="{{ route('catalog') }}">Каталог</a></li>
                <li><a href="{{ route('guarantees') }}">Доставка и оплата</a></li>
                <li><a href="{{ route('cart.index') }}">Корзина</a></li>
                @auth
                    <li><a href="profile">{{ Auth::user()->name }}</a></li>
                @else
                    <li><a href="{{ route('auth.login') }}">Вход</a></li>
                @endauth
            </ul>
        </nav>
        <div class="contacts">
            <span>ComfortCraze@mail.ru</span>
            <span>8 (800) 552-89-79</span>
        </div>
    </div>
</header>
<div class="wrapper">