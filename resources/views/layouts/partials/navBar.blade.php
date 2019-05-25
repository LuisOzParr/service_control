<nav class="navbar" role="navigation" aria-label="main navigation">
    <div class="navbar-brand">
        <a class="navbar-item" href="{{ url('/') }}">
            <img src="https://ozparrsource.com/img/icono/logo.png" width="112" height="28" alt="logo">
        </a>

        <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
        </a>
    </div>

    <div class="navbar-menu">
        <div class="navbar-start">
            <a class="navbar-item">
                Home
            </a>

            <a class="navbar-item">
                Documentation
            </a>
        </div>

        <div class="navbar-end">
            @guest
                <div class="navbar-item">
                    <div class="buttons">
                        @if (Route::has('register'))
                            <a class="button is-primary" href="{{ route('register') }}">{{ __('Register') }}</a>
                        @endif
                        <a class="button is-light" href="{{ route('login') }}"><strong>{{ __('Login') }}</strong></a>
                    </div>
                </div>
            @else
                <div class="navbar-item has-dropdown is-hoverable">
                    <a class="navbar-link">
                        {{ Auth::user()->name }}
                    </a>

                    <div class="navbar-dropdown">
                        <a class="navbar-item">
                            Hola
                        </a>
                        <hr class="navbar-divider">
                        <a class="navbar-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </div>
            @endguest
        </div>
    </div>
</nav>