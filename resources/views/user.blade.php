@extends('layout.main')

@section('title')
    Профил на {{ $user->name }} - УСП Проект
@endsection

@section('content')
    <div class="container mt-3">
        <h3 class="pb-2 mt-4 font-italic border-bottom">
            Потребител
        </h3>
        <p class="lead">
            {{ $user->name }}
            @auth
                @if (auth()->user()->id == $user->id)
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editProfile">
                        Редакция
                    </button>
                    <div class="modal" id="editProfile" tabindex="-1" aria-labelledby="editProfileLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                @livewire('user-edit')
                            </div>
                        </div>
                    </div>
                @endif
            @endauth
        </p>
        <h3 class="pb-2 mt-4 font-italic border-bottom">
            Добавени филми
        </h3>
        @foreach ($movies->chunk(3) as $chunks)
            <div class="row course-set courses__row">
                @foreach ($chunks as $movie)
                    <div class="col-md-4 course-block course-block-lessons">
                        <div class="card mb-4" style="max-width: 540px">
                            <div class="row g-0">
                                <div class="col-xl-4">
                                    <img src="{{ $movie->getImageUrl() }}" alt="..." class="img-fluid h-100 w-100" />
                                </div>
                                <div class="col-xl-8">
                                    <div class="card-body">
                                        <h5 class="card-title">
                                            <a href="{{ route('home.movies.show', $movie->slug) }}">
                                                {{ $movie->title }}
                                            </a>
                                            @if (auth()->user()->id == $user->id)
                                                <a class="btn btn-primary" href="{{ route('movies.edit', $movie->id) }}">
                                                    Редакция
                                                </a>
                                            @endif
                                        </h5>
                                        <p class="card-text">
                                            {{ $movie->plot }}

                                        </p>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach
        {{ $movies->links() }}
    </div>
@endsection
