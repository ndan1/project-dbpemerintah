<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    {{-- <link rel="stylesheet" href="{{ asset('app.css') }}"> --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    </head>

<body>
    <div class="all-home">
        <nav class="navbar navbar-expand-lg px-5">
            <div class="container-fluid nav-master">
                <a class="navbar-brand nav-master-title" href="#">Pemerintah Kota Malang</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="ms-auto nav-master-menu">
                    <div class="collapse navbar-collapse" id="navbarNavDropdown">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="{{route('home')}}">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Tentang</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    SIM
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="{{route('pembuatan-sim')}}">Pembuatan SIM</a></li>
                                    <li><a class="dropdown-item" href="{{route('perpanjang-sim')}}">Perpanjangan SIM</a></li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Berita</a>
                            </li>
                            @auth
                            <li class="nav-item dropdown" style="list-style-type: none;">
                                <a class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false" >
                                    Profil
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="{{route('profile', ['customer_email' => Auth::user()->customer_email])}}">Edit Profil</a></li>
                                    <li><a class="dropdown-item" href="">Edit Akun</a></li>
                                    <li><a class="dropdown-item" href="{{route('logout')}}">Logout</a></li>
                                </ul>
                            </li>
                            @else
                        </ul>
                        <button class="btn btn-light btn-rounded"><a href="{{url('login')}}" class="text-decoration-none text-reset">Login</a></button>
                        @endauth
                    </div>
                </div>


            </div>
        </nav>
        @yield('scripts')
        @yield('content')
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
