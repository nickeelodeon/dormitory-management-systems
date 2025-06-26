<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'EASYHOME') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body class="bg-white">
    <div id="app" class="d-flex">
        <!-- Sidebar -->
        <div class="flex-shrink-0 p-3 bg-white" style="width: 280px; min-height: 100vh;">
            <a href="{{ url('admin/dashboard') }}" class="d-flex align-items-center pb-3 mb-3 link-dark text-decoration-none border-bottom">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" style="width: 150px;">
            </a>
            <ul class="list-unstyled ps-0">
                <li class="mb-1">
                    <button class="btn btn-toggle align-items-center rounded" data-bs-toggle="collapse" data-bs-target="#dashboard-collapse" aria-expanded="true" style="font-weight:bolder">
                        Dashboards
                    </button>
                    <div class="collapse show" id="dashboard-collapse">
                        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small" style="padding-left: 35px;">
                            <li><a href="{{route('admin.dashboard')}}" class="link-dark rounded">Resident</a></li>
                            <li><a href="{{route('admin.staff')}}" class="link-dark rounded">Staff</a></li>
                            <li><a href="{{route('admin.room')}}" class="link-dark rounded">Room</a></li>
                        </ul>
                    </div>
                </li>
                <li class="border-top my-3"></li>
                <li class="mb-1">
                    <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#account-collapse" aria-expanded="false" style="font-weight:bolder">
                        Account
                    </button>
                    <div class="collapse" id="account-collapse">
                        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small" style="padding-left: 35px;">
                            <li><a href="#" class="link-dark rounded">Profile</a></li>
                            @auth
                                <li>
                                    <a class="link-dark rounded" href="{{ route('logout') }}"
                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        Sign out
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            @endauth
                            @guest
                                <li><a href="{{ route('login') }}" class="link-dark rounded">Login</a></li>
                                <li><a href="{{ route('register') }}" class="link-dark rounded">Register</a></li>
                            @endguest
                        </ul>
                    </div>
                </li>
            </ul>
        </div>

        <!-- Main Content -->
        <main class="flex-grow-1 py-4 px-4" style="background-color: #f8f9fa;">
            @yield('content')
        </main>
    </div>
</body>
</html>
