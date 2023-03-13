<div class="sticky" id="app">

    <div class="bannerImg d-flex justify-content-center">
        <img src="{{ asset('assets\img\logo-no-text.svg') }}" alt="Logo Grill-O-Presto">
    </div>


    <nav class="navbar navbar-expand-md navbar-dark bg-third shadow-sm">
        <div class="container">
            <a class="custom-navbar-brand title-shadow" href="{{ url('/home') }}">
                {{ config('app.name', 'Grill-O-Presto') }}
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav me-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ms-auto">
                    <!-- Authentication Links -->
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link text-light fs-5" href="{{ route('login') }}">{{ __('Connexion') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link text-light fs-5 pl-5"
                                    href="{{ route('register') }}">{{ __('Inscription') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ url('/home') }}">
                                    {{ __('Accueil') }}
                                </a>
                                
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Déconnexion') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                                
                                @if ((Auth::check() and (auth()->user()->isUser())))
                                <a class="dropdown-item" href="{{ route('profile') }}">
                                    {{ __('Mon compte') }}
                                </a>
                                @endif
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
</div>
