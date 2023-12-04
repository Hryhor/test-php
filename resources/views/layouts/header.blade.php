<header class="header">
    <div class="container">
        <nav class="nav">
            <ul class="menu">
                <li class="menu__item  {{ request()->is('/') ? 'active' : '' }}">
                    <a class="menu__link" href="{{ url('/products') }}">Головна</a>
                </li>
                <li class="menu__item">
                    <a class="menu__link accent" href="#!">Акції</a>
                </li>
                <li class="menu__item">
                    <a class="menu__link" href="#!">Клієнтам</a>
                </li>
                <li class="menu__item">
                    <a class="menu__link" href="#!">Про нас</a>
                </li>
                <li class="menu__item">
                    <a class="menu__link" href="#!">Контакти</a>
                </li>
            </ul>
        </nav>
    </div>
</header>