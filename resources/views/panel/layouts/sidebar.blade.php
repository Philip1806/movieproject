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
                <a class="nav-link" href="{{ route('movies.create') }}">
                    <i class="nav-icon fa-solid fa-clapperboard"></i>
                    Добавяне на филм</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" data-toggle="modal" data-target="#addDirector">
                    <i class="nav-icon fa-solid fa-person-circle-plus"></i>
                    Добавяне на режисьори</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" data-toggle="modal" data-target="#addActor">
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
                <a class="nav-link {{ Request::path() === 'panel/categories' ? 'active' : '' }}"
                    href="{{ route('panel.categories.index') }}">
                    <i class="nav-icon fa-solid fa-cubes"></i>
                    Жанрове</a>
            </li>
        </ul>
    </div>
</nav>

<!-- Modal -->
<div class="modal fade" id="addActor" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addActorLabel">Добавяне на съдържание</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @livewire('actors-create')
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Отказ</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="addDirector" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="addDirectorLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addDirectorLabel">Добавяне на съдържание</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @livewire('directors-create')
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Отказ</button>
            </div>
        </div>
    </div>
</div>
