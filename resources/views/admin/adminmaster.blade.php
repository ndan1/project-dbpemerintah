<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('sidebars.css') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="apple-touch-icon" href="/docs/5.0/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
    <link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
    <link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
    <link rel="manifest" href="/docs/5.0/assets/img/favicons/manifest.json">
    <link rel="mask-icon" href="/docs/5.0/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
    <link rel="icon" href="/docs/5.0/assets/img/favicons/favicon.ico">
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
      </style>


      <!-- Custom styles for this template -->
      <link href="sidebars.css" rel="stylesheet">
    </head>
<body>
        {{-- <nav class="navbar bg-body-tertiary fixed-top">
            <div class="container-fluid">
            <a class="navbar-brand" href="#">Offcanvas navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Offcanvas</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                    <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Dropdown
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li>
                        <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                    </li>
                </ul>
                <form class="d-flex mt-3" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
                </div>
            </div>
            </div>
        </nav> --}}
      <main>
      <div class="d-flex flex-column flex-shrink-0 p-3 bg-light" style="width: 280px;">
        <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
          <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg>
          <span class="fs-4">Sidebar</span>
        </a>
        <hr>
        <ul class="nav nav-pills flex-column mb-auto" id="sidebar-menu">
          <li class="{{(Request::is('adminpanel'))?'nav-item':''}}">
            <a href="{{url('adminpanel')}}" class="nav-link link-sidebar {{(Request::is('adminpanel'))?'active':''}} " aria-current="page">
              <svg class="bi me-2" width="16" height="16"><use xlink:href="#home"/></svg>
              Dashboard
            </a>
          </li>
          <li class="{{(Request::is('adminpembuatan'))?'nav-item':''}}">
            <a href="{{url('adminpembuatan')}}" class="nav-link link-sidebar {{(Request::is('adminpembuatan'))?'active':''}}">
              <svg class="bi me-2" width="16" height="16"><use xlink:href="#speedometer2"/></svg>
              Pembuatan SIM
            </a>
          </li>
          <li>
            <a href="#" class="nav-link">
              <svg class="bi me-2" width="16" height="16"><use xlink:href="#table"/></svg>
              Perpanjangan SIM
            </a>
          </li>
          <li>
            <a href="#" class="nav-link">
              <svg class="bi me-2" width="16" height="16"><use xlink:href="#grid"/></svg>
              Jadwal Kedatangan
            </a>
          </li>
          <li>
            <a href="#" class="nav-link">
              <svg class="bi me-2" width="16" height="16"><use xlink:href="#people-circle"/></svg>
              User Lists
            </a>
          </li>
        </ul>
        <hr>
        <div class="dropdown">
          <a href="#" class="d-flex align-items-center link-dark text-decoration-none dropdown-toggle" id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
            <strong>{{ Auth::guard('pegawai')->user()->name_pegawai }}</strong>
          </a>
          <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2">
            <li><a class="dropdown-item" href="#">New project...</a></li>
            <li><a class="dropdown-item" href="#">Settings</a></li>
            <li><a class="dropdown-item" href="#">Profile</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="{{route('logoutadmin')}}">Sign out</a></li>
          </ul>
        </div>
      </div>
      @yield('content')
    </main>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>
<script>
    // document.addEventListener('DOMContentLoaded', function() {
    //     const sidebarMenu = document.getElementById('sidebar-menu');
    //     const menuItems = sidebarMenu.querySelectorAll('.nav-item');

    //     menuItems.forEach(item => {
    //         item.addEventListener('click', function() {
    //             // Remove active class from all menu items
    //             menuItems.forEach(i => {
    //                 i.querySelector('a').classList.remove('active');
    //                 i.querySelector('a').classList.add('link-dark');
    //             });

    //             // Add active class to the clicked item
    //             this.querySelector('a').classList.add('active');
    //             this.querySelector('a').classList.remove('link-dark');
    //         });
    //     });
    // });
    document.addEventListener('DOMContentLoaded', function() {
        const sidebarMenu = document.getElementById('sidebar-menu');
        const menuLinks = sidebarMenu.querySelectorAll('.nav-link');

        menuLinks.forEach(link => {
            link.addEventListener('click', function() {
                // Remove active class from all links and remove nav-item from parent li
                menuLinks.forEach(l => {
                    l.classList.remove('active');
                    l.classList.add('link-dark');
                    l.parentElement.classList.remove('nav-item');
                });

                // Add active class to the clicked link and add nav-item to parent li
                this.classList.add('active');
                this.classList.remove('link-dark');
                this.parentElement.classList.add('nav-item');
            });
        });
    });
</script>
</html>
