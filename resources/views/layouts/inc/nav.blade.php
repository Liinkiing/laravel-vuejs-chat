<nav class="main-nav">
    <div class="container">
        <div class="brand">
            <h1><a class="nav-item" href="{{ route('homepage') }}">Chattr</a></h1>
        </div>
        <ul class="nav-items">
            @if(Auth::check())
                <li><a id="logged-user" class="nav-item" href="#">{{ Auth::user()->name }}</a></li>
                <li><a class="nav-item"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                       href="{{ route('logout') }}">Se déconnecter</a></li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            @else
                <li><a class="nav-item" href="{{ route('login') }}">Se connecter / S'inscrire</a></li>
            @endif
        </ul>
    </div>
</nav>