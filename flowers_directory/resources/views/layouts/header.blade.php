<nav class="navbar navbar-expand-lg bg-body-tertiary mb-5 shadow">
    <div class="container-fluid">
        <a class="navbar-brand fw-bold fs-3" href="#">Administrator</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link fs-5" aria-current="page" href=""><i class="fa-solid fa-house text-info mx-1"></i>Home page</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fs-5" aria-current="page" href=""><i class="fa-solid fa-house-lock text-warning mx-1"></i>Home admin</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fs-5" href="{{ route('flowers.index') }}"><i class="fa-brands fa-slack text-success mx-1"></i>Flower</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fs-5" href="{{ route('regions.index') }}"><i class="fa-solid fa-chart-area text-secondary mx-1"></i>Region</a>
                </li>
            </ul>
            <form class="d-flex" role="search" method="GET" action="/search">
                <input class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>
        </div>
    </div>
</nav>