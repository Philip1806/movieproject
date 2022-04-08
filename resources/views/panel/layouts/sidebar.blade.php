<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="sidebar-sticky pt-3">

        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/panel') }}">
                    <i class="fa-solid fa-gauge"></i>
                    Начало
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/') }}">
                    <i class="nav-icon fa-solid fa-house"></i>
                    Обратно
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="nav-icon fa-solid fa-clapperboard"></i>
                    Добавяне на филм</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="typography.html">
                    <i class="nav-icon fa-solid fa-person-circle-plus"></i>
                    Добавяне на режисьори</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="typography.html">
                    <i class="nav-icon fa-solid fa-person-circle-plus"></i>
                    Добавяне на актьори</a>
            </li>

        </ul>

        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span>Админ</span>
        </h6>
        <ul class="nav flex-column mb-2">
            <li class="nav-item">
                <a class="nav-link {{ Request::path() === 'panel/movies' ? 'active' : '' }}"
                    href="{{ route('movies.index') }}">
                    <i class="nav-icon fa-solid fa-clapperboard"></i>
                    Филми</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::path() === 'panel/directors' ? 'active' : '' }}"
                    href="{{ route('panel.directors.index') }}">
                    <i class="nav-icon fa-solid fa-person-circle-plus"></i>
                    Режисьори</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::path() === 'panel/cast' ? 'active' : '' }}"
                    href="{{ route('panel.cast.index') }}">
                    <i class="nav-icon fa-solid fa-person-circle-plus"></i>
                    Актьори</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="typography.html">
                    <i class="nav-icon fa-solid fa-cubes"></i>
                    Жанрове</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="typography.html">
                    <i class="nav-icon fa-solid fa-users"></i>
                    Потребители</a>
            </li>
        </ul>
    </div>
</nav>
