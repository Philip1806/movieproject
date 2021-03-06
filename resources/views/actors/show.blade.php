@extends('layout.main')

@section('title')
    Филми - УСП Проект
@endsection

@section('content')
    <div class="container mt-3">
        <div class="px-4 pb-4 pt-3">
            <div class="alert alert-dark" role="alert">
                Филми в които участва {{ $actor->name }}
            </div>
        </div>
        @include('movies._listmovies')
        @if ($movies->isEmpty())
            <div class="alert alert-info my-3" role="alert">
                Актьора не участва във филми.
            </div>
        @endif
    </div>
@endsection
