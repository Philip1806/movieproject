@extends('panel.layouts.main')

@section('content')
    <div class="lead mb-2">
        Списък с актьори
    </div>
    @livewire('actors-admin-table')
@endsection
