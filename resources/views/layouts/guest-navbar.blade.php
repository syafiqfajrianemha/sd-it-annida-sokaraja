<header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">
        <a href="{{ config('app.url') }}" class="logo d-flex align-items-center me-auto">
            <img src="{{ asset('images/logo.svg') }}" alt="Logo">
        </a>

        <nav id="navmenu" class="navmenu">
            <ul>
                <li><a href="{{ route('home') }}" class="{{ Request::routeIs('home', 'home.*') ? 'active' : '' }}">HOME</a></li>
                <li class="dropdown"><a href="#" class="{{ Request::routeIs('guest.profil.*') ? 'active' : '' }}"><span>PROFIL</span> <i
                            class="bi bi-chevron-down toggle-dropdown"></i></a>
                    <ul>
                        <li><a href="{{ route('guest.profil.visi-dan-misi') }}">VISI DAN MISI</a></li>
                        <li><a href="#">IDENTIAS SEKOLAH</a></li>
                        <li><a href="#">PROGRAM SEKOLAH</a></li>
                    </ul>
                </li>
                <li><a href="#">PPDB</a></li>
                <li><a href="{{ route('guest.ekskul') }}" class="{{ Request::routeIs('guest.ekskul', 'guest.ekskul.*') ? 'active' : '' }}">EKSKUL</a></li>
                <li><a href="#">PRESTASI</a></li>
                <li><a href="#">BERITA</a></li>
            </ul>
            <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>

        <a class="btn-getstarted text-uppercase" href="{{ route('login') }}">Login</a>
    </div>
</header>
