<!doctype html>
<html lang="en">

<head>
    @include('panel.layouts.head')
</head>

<body>
    <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="#">Dashboard</a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse"
            data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
        <ul class="navbar-nav px-3">
            <li class="nav-item text-nowrap">
                <a href="{{ route('home.user.index', auth()->user()->slug) }}" class="nav-link">
                    {{ auth()->user()->name }}
                </a>
            </li>
        </ul>
        <ul class="navbar-nav px-3">
            <li class="nav-item text-nowrap">
                <a href="{{ route('logout') }}" class="nav-link"
                    onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                    Изход
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </a>
            </li>
        </ul>
    </nav>
    <div class="container-fluid">
        <div class="row">
            @include('panel.layouts.sidebar')
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4 mt-2">
                @if (Session::has('success'))
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        {{ Session::get('success') }}
                    </div>
                @endif

                @if (Session::has('warning'))
                    <div class="alert alert-warning alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        {{ Session::get('warning') }}
                    </div>
                @endif

                @if (Session::has('error'))
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        {{ Session::get('error') }}
                    </div>
                @endif

                @if (count($errors) > 0)
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li> {{ $error }} </li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @yield('content')
            </main>
        </div>
    </div>
    <!-- Toastr -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    @livewireScripts
    <script>
        window.livewire.on('alert', param => {
            toastr[param['type']](param['message'], param['title']);
        });
    </script>
    <script>
        window.livewire.on('closeModal', id => {
            $(id).modal('hide');
        })
        window.livewire.on('showModal', id => {
            $(id).modal('show');
        })
    </script>
    <script>
        $("#datepicker").datepicker({
            changeMonth: true,
            changeYear: true,
        });
        $("#datepicker").datepicker("option", "dateFormat", "dd/mm/yy");
        $("#datepicker1").datepicker({
            changeMonth: true,
            changeYear: true,
        });
        $("#datepicker1").datepicker("option", "dateFormat", "dd/mm/yy");
    </script>
</body>

</html>
