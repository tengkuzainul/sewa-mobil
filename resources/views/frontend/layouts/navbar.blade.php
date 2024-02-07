<nav class="navbar navbar-expand-lg navbar-light bg-light p-3 fixed-top">
    <div class="container px-4 px-lg-5">
        <a class="navbar-brand" href="{{ url('/') }} "><b class="text-uppercase fw-bold">Sewa Mobil App</b></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('/') ? 'active border-bottom border-5 border-primary' : '' }}"
                        href="{{ url('/') }}">Home</a>
                </li>
                <li class="nav-item ms-3">
                    <a class="nav-link {{ request()->is('contact') ? 'active border-bottom border-5 border-primary' : '' }}"
                        href="{{ route('contact') }}">Contact</a>
                </li>
                @if (Route::has('login'))
                    @auth
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <button class="nav-link btn btn-dark text-light ms-3" type="submit">
                                Log out <i class="bi bi-box-arrow-in-left"></i>
                            </button>
                        </form>
                    @else
                        <li class="nav-item ms-3">
                            <a class="nav-link btn btn-dark text-light" href="{{ route('login') }}">
                                Log in <i class="bi bi-box-arrow-in-right"></i>
                            </a>
                        </li>
                    @endauth
                @endif
            </ul>
        </div>
    </div>
</nav>
