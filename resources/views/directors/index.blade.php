@extends('layout.main')

@section('title')
    Режисьори - УСП Проект
@endsection
@section('content')
    <div class="container">
        @foreach ($directors->chunk(4) as $chunks)
            <div class="row course-set courses__row my-5">
                @foreach ($chunks as $director)
                    <div class="col-md-3 course-block course-block-lessons">
                        <div class="post-author">

                            <div class="post-author-content">
                                <div class="card-footer text-white bg-dark">
                                    <a href="{{ route('home.directors.show', $director->slug) }}">
                                        {{ $director->name }}
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach
        {{ $directors->links() }}

    </div>
@endsection
