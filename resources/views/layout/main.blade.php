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
</body>

</html>
