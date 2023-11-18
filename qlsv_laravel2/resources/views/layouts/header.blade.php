<nav class="navbar navbar-expand-lg bg-body-tertiary mb-5 shadow">
    <div class="container-fluid">
        <a class="navbar-brand fw-bold">Administrator</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link text-dark" aria-current="page" href="">Trang chủ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" aria-current="page" href="">Trang ngoài</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="{{ route('groups.index') }}">Lớp học</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="{{ route('students.index') }}">Sinh viên</a>
                </li>
            </ul>
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Tìm kiếm" aria-label="Search">
                <button class="btn btn-outline-success" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>
        </div>
    </div>
</nav>