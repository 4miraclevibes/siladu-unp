<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img src="https://siladu.unp.ac.id/assets/logo.png" style="max-width: 200px" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('beranda') ? 'active' : '' }}" aria-current="page" href="{{ route('beranda') }}">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('profiles') ? 'active' : '' }}" aria-current="page" href="{{ route('profiles') }}">Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('tool') ? 'active' : '' }}" aria-current="page" href="{{ route('tool') }}">Fasilitas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('announcement', 'announcement.show') ? 'active' : '' }}" aria-current="page" href="{{ route('announcement') }}">Berita</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('article', 'article.show') ? 'active' : '' }}" aria-current="page" href="{{ route('article') }}">Artikel</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('gallery') ? 'active' : '' }}" aria-current="page" href="{{ route('gallery') }}">Galeri</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('download') ? 'active' : '' }}" aria-current="page" href="{{ route('download') }}">Download</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('contact') ? 'active' : '' }}" aria-current="page" href="{{ route('contact') }}">Hubungi Kami</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="https://siladu.layananberhentikuliah.com">Pengajuan</a>
                </li>
            </ul>
            @if (Auth::check())
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <button type="submit" class="nav-link">Logout</button>
                        </form>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a>
                    </li>
                </ul>
            @else
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">Register</a>
                    </li>
                </ul>
            @endif
        </div>
    </div>
</nav>