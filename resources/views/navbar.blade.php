<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">Блог</a>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="{{ url('/') }}">Главная</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->is('articles') ? 'active' : '' }}" href="{{ url('/articles') }}">Каталог статей</a>
            </li>
        </ul>
    </div>
</nav>
