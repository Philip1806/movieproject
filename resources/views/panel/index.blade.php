@extends('panel.layouts.main')

@section('content')
    <div class="lead my-3">
        В сайта има
    </div>
    <div class="row">
        <div class="col-sm">
            <div class="card text-white bg-secondary mb-3">
                <div class="card-body">
                    <h2 class="card-title"><i class="nav-icon fa-solid fa-clapperboard"></i> {{ $moviesCount }}</h2>
                    <p class="card-text">Филми</p>
                </div>
            </div>
        </div>
        <div class="col-sm">
            <div class="card text-white bg-secondary mb-3">
                <div class="card-body">
                    <h2 class="card-title"><i class="nav-icon fa-solid fa-person"></i> {{ $actorsCount }}</h2>
                    <p class="card-text">Актьори</p>
                </div>
            </div>
        </div>
        <div class="col-sm">
            <div class="card text-white bg-secondary mb-3">
                <div class="card-body">
                    <h2 class="card-title"><i class="nav-icon fa-solid fa-person"></i> {{ $directorsCount }}</h2>
                    <p class="card-text">Режисьори</p>
                </div>
            </div>
        </div>
    </div>
    <div class="lead mb-3">
        Вие сте добавили
    </div>
    <div class="row">
        <div class="col-sm">
            <div class="card text-white bg-dark mb-3">
                <div class="card-body">
                    <h2 class="card-title"><i class="nav-icon fa-solid fa-clapperboard"></i>
                        {{ auth()->user()->movies()->count() }}</h2>
                    <p class="card-text">Филми</p>
                </div>
            </div>
        </div>
        <div class="col-sm">
            <div class="card text-white bg-dark mb-3">
                <div class="card-body">
                    <h2 class="card-title"><i class="nav-icon fa-solid fa-person"></i>
                        {{ auth()->user()->actors()->count() }}</h2>
                    <p class="card-text">Актьори</p>
                </div>
            </div>
        </div>
        <div class="col-sm">
            <div class="card text-white bg-dark mb-3">
                <div class="card-body">
                    <h2 class="card-title"><i class="nav-icon fa-solid fa-person"></i>
                        {{ auth()->user()->directors()->count() }}</h2>
                    <p class="card-text">Режисьори</p>
                </div>
            </div>
        </div>
    </div>
    @if (auth()->user()->movies()->count() < 1)
        <div class="jumbotron">
            <h1 class="display-4">Добре дошли!</h1>
            <p class="lead">
                Успешно създадохте профил. Може да се върнете към публичната част, за да оценявате вече добавените филми
                или от менюто вляво да добавите ново съдържание към сайта.
            </p>
            <hr class="my-4">
            <a class="btn btn-primary btn-lg" href="{{ route('movies.create') }}" role="button">Добавяне на филм</a>
        </div>
    @endif
@endsection
