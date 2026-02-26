<header class="header">
        <a href="{{ route('admin.index') }}" class="header-text-admin"><h1>Админ панель<h1></a>
</header>
<div class="container">
        <!-- Боковая навигация -->
        <aside class="sidebar">
            <nav>
                <div class="block"><a href="{{ route('admin.products') }}">Товары</a></div>
                <div class="block"><a href="{{ route('admin.users') }}">Пользователи</a></div>
                <div class="block"><a href="{{ route('admin.orders') }}">Заказы</a></div>
            </nav>
            <button class="logout-btn"><a href="{{ route('profile') }}">Выход</a></button>
        </aside>