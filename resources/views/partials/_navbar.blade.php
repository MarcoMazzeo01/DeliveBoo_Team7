<nav class="navbar navbar-expand-sm navbar-light customer_nav">
    <div class="container">

        <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavId"
            aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav justify-content-between w-100 mt-2 mt-lg-0">
                <li class="nav-item">
                    <a class="nav-link text-light fw-bold {{ Route::currentRouteName() == 'guest.home' ? 'active' : '' }}"
                        href="{{ route('guest.home') }}" aria-current="page">Deliveboo <i class='ms-2 fas fa-motorcycle'
                            style='font-size:18px; color:white'></i><span class="visually-hidden">(current)</span></a>
                </li>
                @guest
                    <div class="d-flex">
                        <li class="nav-item">
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
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                        <li class="nav-item">

                            <a class="nav-link" href="{{ route('admin.restaurant') }}">My Restaurant</a>
                        </li>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                    </li>
            </div>
        @endguest
        </ul>

    </div>
    </div>
</nav>
