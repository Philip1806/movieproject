@extends('layout.main')

@section('title')
    Филми - УСП Проект
@endsection

@section('content')
    <div class="container mt-3">
        <div class="px-4 pb-4 pt-3">
            @foreach ($categories as $category)
                <a href="{{ route('home.movies.genre', $category->slug) }}" class="btn btn-dark btn-lg mx-2" role="button"
                    aria-pressed="true">{{ $category->name }}</a>
            @endforeach
        </div>
        @include('movies._listmovies')

    </div>
@endsection
