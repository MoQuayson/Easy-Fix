<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="icon" href="{{asset('assets/images/logo.png')}}">
    <title>@yield('title')</title>

    <script type="module">
        import RefreshRuntime from 'http://localhost:5173/@react-refresh'
        RefreshRuntime.injectIntoGlobalHook(window)
        window.$RefreshReg$ = () => {}
        window.$RefreshSig$ = () => (type) => type
        window.__vite_plugin_react_preamble_installed__ = true
      </script>

    @vite(['resources/css/app.css','resources/sass/app.scss', 'resources/js/app.js'])
    <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">

</head>
<body>
    <nav id="nav" class="navbar navbar-expand-lg navbar-light bg-light sticky-top shadow-sm">
        <div class="container">
            <a class="navbar-brand fs-4" href="/">
                <img class="img-fluid logo" src="{{ asset('assets/images/logo.png') }}" alt="logo">
                <span class="logo-name">Easy-Fix</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-lg-3 d-flex align-items-center me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('dashboard.index') }}">Dashboard</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('issues.index') }}">Gadget Issues</a>
                    </li>

                    @can('create-solution')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('solutions.index') }}">Gadget Solutions</a>
                    </li>
                    @endcan

                    @can('create-user')
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('users.index') }}">Users</a>
                    </li>
                    @endcan

                    @can('create-role')
                    <li class="nav-item dropdown">
                        <a class="nav-link  d-flex align-items-center gap-1" id="navbarDropdownMenuLink" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Authorization
                        </a>
                        <ul class="dropdown-menu dropdown-menu-hover dropdown-menu-macos mx-0 shadow"
                            aria-labelledby="navbarDropdownMenuLink">


                            <a class="dropdown-item d-flex align-items-center gap-2 py-2"
                                    href="{{ route('roles.index') }}">
                                    Roles
                            </a>

                            <a class="dropdown-item d-flex align-items-center gap-2 py-2"
                                    href="{{ route('permissions.index') }}">
                                    Permissions
                            </a>

                        </ul>
                    </li>
                    @endcan
                </ul>

                <div class="dropdown">
                    <a class="auth-user dropdown-toggle text-decoration-none" id="user_dropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        {{ Auth::user()->name }}
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="#user_dropdown">
                        <li><a class="dropdown-item" href="#" hidden>Profile</a></li>
                        <li>
                            <hr class="dropdown-divider" hidden>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{route('sign-out.index')}}"><i
                            class="bi bi-box-arrow-right me-1"></i>Sign-out</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <main>
        <nav class="navbar navbar-expand">
            <div class="container d-flex align-middle justify-content-between">
                @yield('breadcrumbs')
                @if (!Request::is('users/create*'))
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="{{route('users.create')}}" class="btn submit-btn">Create New User</a>
                        </li>
                    </ul>

                @else
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="{{route('users.index')}}" class="btn submit-btn">View All Users</a>
                        </li>
                    </ul>
                @endif
            </div>
        </nav>

        <div class="container">
            @include('partials.alert')
        </div>
        @yield('content')
    </main>

    @yield('scripts')
</body>
</html>
