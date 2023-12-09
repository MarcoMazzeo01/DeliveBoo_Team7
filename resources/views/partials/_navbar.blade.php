<nav class="navbar navbar-expand-sm navbar-light customer_nav">
    <div class="container">

        <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavId"
            aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation" style="color: #3a970f;">
            <span class="navbar-toggler-icon">
                <img src="{{ asset('images/logo.png') }}" >
            </span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav justify-content-between w-100 mt-2 mt-lg-0">
                @guest
                    <li class="nav-item">
                        <a class="nav-link text-light fw-bold {{ Route::currentRouteName() == 'guest.home' ? 'active' : '' }}"
                            href="{{ route('guest.home') }}" aria-current="page"> 
                            <div class="app-logo">
                                <img src="{{ asset('images/color-no-bg.png') }}" class="logo-image" >
                            </div> 
                            
                                </a>
                    </li>
                    <div class="d-flex">
                        <li class="nav-item pe-3" >
                            <a class="nav-link text-light fw-bold" href="{{ route('login') }}">{{ __('Login') }} <i
                                    class="fa-solid fa-user ms-1" me-2></i></a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link text-light fw-bold"
                                    href="{{ route('register') }}">{{ __('Diventa partner') }}</a>
                            </li>
                        @endif
                    @else
                        <div>
                            <a class="nav-link text-light fw-bold {{ Route::currentRouteName() == 'admin.restaurant' ? 'active' : '' }}"
                                href="{{ route('admin.restaurant') }}" aria-current="page">
                                <div class="app-logo">
                                    <img src="{{ asset('images/color-no-bg.png') }}"  class="logo-image">
                                </div>
                                
                            </a>
                        </div>
                        <div class="d-flex flex-row">
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle text-light fw-bold" href="#"
                                    role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                    v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle text-light fw-bold" href="#"
                                role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                v-pre href="{{ route('admin.restaurant') }}"> 
                                    Ristorante 
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('admin.restaurant') }}"
                                    >
                                    Il mio ristorante
                                </a>
                                    <a class="dropdown-item" href="{{ route('admin.orders-summary') }}"
                                        >
                                        Riepilogo ordini
                                    </a>

                                    <a class="dropdown-item" href="{{ route('admin.orders-summary') }}"
                                        >
                                        Le mie statistiche
                                    </a>

                                    
                            </li>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                        </li>
                    </div>
            </div>
        @endguest
        </ul>
    </div>
    </div>
</nav>
