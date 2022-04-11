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
        @include('movies._listmovies')

    </div>
@endsection
