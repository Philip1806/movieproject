@extends('layout.main')

@section('title')
    УСП Проект
@endsection

@section('meta')
    <meta name="description" content="Курсов проект по УСП." />
    <!-- Open Graph / Facebook -->
    <meta name="og:description" property="og:description" content="Курсов проект по УСП.">
    <meta property="og:type" content="website" />
    <meta name="og:title" property="og:title" content="УСП Проект">
    <meta name="og:site_name" property="og:site_name" content="УСП Проект">
    <meta name="og:url" property="og:url" content="{{ url('/') }}" />
    <meta name="og:locale" property="og:locale" content="bg_BG" />
@endsection

@section('content')
    <div class="container mt-3">
        <h3 class="pb-4 mb-4 font-italic border-bottom">
            Последно добавени филми
        </h3>
        @foreach ($movies->chunk(3) as $chunks)
            <div class="row course-set courses__row">
                @foreach ($chunks as $movie)
                    <div class="col-md-4 course-block course-block-lessons">
                        <div class="card mb-4" style="max-width: 540px">
                            <div class="row g-0">
                                <div class="col-xl-4">
                                    <img src="{{ $movie->getImageUrl() }}" alt="..." class="img-fluid" />
                                </div>
                                <div class="col-xl-8">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $movie->title }}</h5>
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
    </div>
@endsection
