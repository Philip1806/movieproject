<!DOCTYPE html>
<html lang="en">

<head>
    @include('layout.head')
</head>

<body>
    @include('layout.nav')

    @yield('content')

    @include('layout.footer')

    <!-- MDB -->
    <script type="text/javascript" src="{{ url('js/mdb.min.js') }}"></script>
    <!-- Custom scripts -->
    <script type="text/javascript"></script>
    @livewireScripts
    <script>
        window.livewire.on('closeModal', id => {
            $(id).modal('hide');
        })
        window.livewire.on('showModal', id => {
            $(id).modal('show');
        })
    </script>
</body>

</html>
