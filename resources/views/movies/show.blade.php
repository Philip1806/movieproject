@extends('layout.main')

@section('title')
    Филми - УСП Проект
@endsection

@section('content')
    <div class="container my-4">
        <div class="row">
            <div class="col-md-3">
                <img src="{{ $movie->getImageUrl() }}" alt="..." class="img-fluid w-100" />
            </div>
            <div class="col-md">
                <h3 class="py-2 mb-4 font-italic border-bottom">
                    {{ $movie->title }} ({{ $movie->year }})
                </h3>
                <p>
                    {{ $movie->plot }}
                </p>
                <p><b>Режисьор:</b> {{ $movie->director->name }}</p>
            </div>
        </div>
        <h3 class="pb-2 mt-4 font-italic border-bottom">
            Актьори
        </h3>
        @include('actors._listactors')

    </div>
@endsection
