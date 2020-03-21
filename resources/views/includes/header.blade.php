<div class="navbar">
    <div class="navbar__wrapper">
        <a class="logo" href="/">LOGO</a>
        @guest
        @if (Route::has('register'))
        <a href='/login' class="button">Войти</a>
        @endif
        @else
        <div class="navbar__row">
        <a href="/editor" class="button mr-1">Новый пост</a>
        <a class="button" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
            {{ __('Выйти') }}
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>

        </div>
        @endguest
    </div>
</div>