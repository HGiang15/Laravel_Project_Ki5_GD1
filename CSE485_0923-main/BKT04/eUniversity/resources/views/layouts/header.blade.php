<header class="bg-light-subtle w-80 mx-5 p-4 shadow">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand fw-bold" href="#">MAJOR</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="">HOME</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="majors" href="{{ route('majors.index') }}">MAJOR</a>
                </li>
            </ul>
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </nav>
</header>

<div class="h1 text-center text-primary m-4">
    @yield('title')
</div>