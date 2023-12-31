<html>
    <head>
        @yield('header')
        @vite(['resources/js/app.js','resources/sass/app.scss'])
        <title>@yield('title')</title>
        <style>
            .bd-placeholder-img {
                font-size: 1.125rem;
                text-anchor: middle;
                -webkit-user-select: none;
                -moz-user-select: none;
                user-select: none;
            }
    
            @media (min-width: 768px) {
                .bd-placeholder-img-lg {
                    font-size: 3.5rem;
                }
            }
                body {
                min-height: 75rem;
                padding-top: 5.5rem;
            }
        </style>
    </head>
    <body>
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Persuratan</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav me-auto mb-2 mb-md-0">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="{{ url('/dashboard') }}">Home</a>
                        </li>
                        @if (Auth::user()->role == 'admin')
                            
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/manage-user') }}">Manajemen Pengguna</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/jenis_surat') }}">Jenis Surat</a>
                        </li>
                        
                        @endif
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/transaksi-surat') }}">Transaksi Surat</a>
                        </li>
                    </ul>
                    <form class="d-flex">
                        <a href="{{ url('logout') }}" class="btn btn-outline-danger">Logout</a>
                    </form>
                </div>
            </div>
        </nav>

        <div class="container">
            @yield('content')
        </div>

    </body>
    <footer>
        @yield('footer')
    </footer>
</html>