@extends('panel.layouts.main')

@section('content')
    <div class="lead mb-2">
        Списък с режисьори
    </div>
    @livewire('directors-admin-table')
@endsection
