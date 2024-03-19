<nav class="navbar navbar-expand-lg navbar-dark bg-brown">
    <div class="container">
        <a class="navbar-brand fw-bold" href="/dashboard/home">GY.</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('dashboard/home') ? 'active fw-bold' : '' }}"
                        href="/dashboard/home">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('dashboard/photos*') ? 'active fw-bold' : '' }}"
                        href="/dashboard/photos">Galeri</a>
                </li>
            </ul>

            <ul class="navbar-nav ms-auto">
                @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Wellcome Back, {{ auth()->user()->username }}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li>
                                <form action="/logout" method="POST">
                                    @csrf
                                    <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-right"></i>
                                        Log-Out</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                @else
                    <li class="nav-item">
                        <a href="/login" class="nav-link {{ Request::is('login') ? 'active fw-semibold' : '' }}"><i
                                class="bi bi-box-arrow-in-right mx-2"></i>Login</a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>