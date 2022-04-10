@extends('panel.layouts.main')

@section('content')
    <div class="row">
        <div class="col-sm-3">
            <div class="lead mb-2">
                Добавяне на жанр
            </div>
            @livewire('category-create')
        </div>
        <div class="col-sm-9">
            <div class="lead mb-2">
                Списък с жанрове
            </div>
            @livewire('category-table')
        </div>
    </div>
@endsection
