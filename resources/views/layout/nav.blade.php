<header class="container blog-header py-3">
    <div class="row flex-nowrap justify-content-between align-items-center">
        <div class="col-4 pt-1">
            <a class="text-muted" href="#" aria-label="Search">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor"
                    stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="mx-3" role="img"
                    viewBox="0 0 24 24" focusable="false">
                    <title>Search</title>
                    <circle cx="10.5" cy="10.5" r="7.5" />
                    <path d="M21 21l-5.2-5.2" />
                </svg>
            </a>
        </div>
        <div class="col-4 text-center">
            <a class=" text-light lead" href="{{ url('') }}">УСП Проект</a>
        </div>
        <div class="col-4 d-flex justify-content-end align-items-center">
            @auth
                <a class="btn btn-sm btn-outline-light" href="{{ route('panel.index') }}">Панел</a>
            @else
                <a class="btn btn-sm btn-outline-light mx-2" href="{{ route('login') }}">Вход</a>
                <a class="btn btn-sm btn-outline-light" href="{{ route('register') }}">Регистрация</a>
            @endauth
        </div>
    </div>
</header>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample08"
        aria-controls="navbarsExample08" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-md-center" id="navbarsExample08">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="{{ url('') }}">Начало</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('home.search') }}">Търсене</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('home.movies') }}">Списък с филми</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('movies.create') }}">Добавяне на филм</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('home.actors.index') }}">Списък с актьори</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('home.directors.index') }}">Списък с режисьори</a>
            </li>
        </ul>
    </div>
</nav>
