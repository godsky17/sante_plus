<header class="d-flex flex-wrap align-items-center justify-content-between py-3 position-relative container">
    <!-- Logo -->
    <a href="/" class="d-flex align-items-center text-dark text-decoration-none me-auto">
        <h1 class="m-0">Sante+</h1>
    </a>

    <!-- Mobile Toggle -->
    <button class="navbar-toggler border-0 d-lg-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar">
        <span class="navbar-toggler-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M4 12h16"/><path d="M4 18h16"/><path d="M4 6h16"/>
            </svg>
        </span>
    </button>

    <!-- Desktop Navigation -->
    <div class="d-none d-lg-flex">
        <ul class="nav mb-2 mb-lg-0">
            <li class="nav-item"><a href="{{ route('accueil')}}" class="nav-link px-2 link-dark">Accueil</a></li>
            <li class="nav-item"><a href="{{ route('accueil')}}#services" class="nav-link px-2 link-dark">Services</a></li>
            <li class="nav-item"><a href="{{ route('accueil')}}#blog" class="nav-link px-2 link-dark">Blog</a></li>
            <li class="nav-item"><a href="{{ route('accueil')}}#faq" class="nav-link px-2 link-dark">FAQ</a></li>
        </ul>

        <div class="ms-4">
            <a href="{{ route('auth.connexion') }}" class="btn btn-outline-primary rounded-pill me-2">Connexion</a>
            <a href="{{ route('appointments.symptomes') }}" class="btn btn-primary rounded-pill">Prendre rendez-vous</a>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div class="offcanvas offcanvas-end d-lg-none" tabindex="-1" id="offcanvasNavbar">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title">Sante+</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
        </div>
        <div class="offcanvas-body">
            <ul class="nav flex-column">
                <li class="nav-item"><a href="{{ route('accueil')}}" class="nav-link px-2 link-dark">Accueil</a></li>
                <li class="nav-item"><a href="{{ route('accueil')}}#services" class="nav-link px-2 link-dark">Services</a></li>
                <li class="nav-item"><a href="{{ route('accueil')}}#blog" class="nav-link px-2 link-dark">Blog</a></li>
                <li class="nav-item"><a href="{{ route('accueil')}}#faq" class="nav-link px-2 link-dark">FAQ</a></li>
            </ul>
            <div class="mt-4">
                <a href="{{ route('auth.connexion') }}" class="btn btn-outline-primary rounded-pill w-100 mb-2">Connexion</a>
                <a href="{{ route('appointments.symptomes') }}" class="btn btn-primary rounded-pill w-100">Prendre rendez-vous</a>
            </div>
        </div>
    </div>
</header>