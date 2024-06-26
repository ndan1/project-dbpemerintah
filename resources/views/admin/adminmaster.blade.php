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
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
    />
    <link rel="stylesheet" href="mdb/css/mdb.min.css" />
    <link
    href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.2.0/mdb.min.css"
    rel="stylesheet"
    />
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
      <main>
        {{-- <div class="sticky"> --}}
      <div class="d-flex flex-column flex-shrink-0 p-3 bg-light" style="width: 280px;">
        <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
          <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg>
          <span class="fs-4">Sidebar</span>
        </a>
        <hr>
        <ul class="nav nav-pills flex-column mb-auto" id="sidebar-menu">
          <li class="{{ (Request::is('adminpanel')) ? 'nav-item' : '' }}">
            <a href="{{ url('adminpanel') }}" class="nav-link link-sidebar {{ (Request::is('adminpanel')) ? 'active' : '' }}" aria-current="page">
              <svg class="bi me-2" width="16" height="16"><use xlink:href="#home"/></svg>
              Dashboard
            </a>
          </li>
          <li class="{{ (Request::is('admin/pembuatan-sim')) ? 'nav-item' : '' }}">
            <a href="{{ url('admin/pembuatan-sim') }}" class="nav-link link-sidebar {{ (Request::is('admin/pembuatan-sim')) ? 'active' : '' }}">
              <svg class="bi me-2" width="16" height="16"><use xlink:href="#speedometer2"/></svg>
              Pembuatan SIM
            </a>
          </li>
          <li class="{{ (Request::is('admin/perpanjang-sim')) ? 'nav-item' : '' }}">
            <a href="{{ url('admin/perpanjang-sim') }}" class="nav-link link-sidebar {{ (Request::is('admin/perpanjang-sim')) ? 'active' : '' }}">
              <svg class="bi me-2" width="16" height="16"><use xlink:href="#table"/></svg>
              Perpanjangan SIM
            </a>
          </li>
          <li class="{{ (Request::is('admin/pertanyaan')) ? 'nav-item' : '' }}">
            <a href="{{ url('admin/pertanyaan') }}" class="nav-link link-sidebar {{ (Request::is('admin/pertanyaan')) ? 'active' : '' }}">
              <svg class="bi me-2" width="16" height="16"><use xlink:href="#speedometer2"/></svg>
              Ujian Teori
            </a>
          </li>
          <li class="{{ (Request::is('admin/pembayaran-pembuatan')) ? 'nav-item' : '' }}">
            <a href="{{ url('admin/pembayaran-pembuatan') }}" class="nav-link link-sidebar {{ (Request::is('admin/pembayaran-pembuatan')) ? 'active' : '' }}">
              <svg class="bi me-2" width="16" height="16"><use xlink:href="#grid"/></svg>
              Pembayaran Pembuatan SIM
            </a>
          </li>
          <li class="{{ (Request::is('admin/pembayaran-perpanjangan')) ? 'nav-item' : '' }}">
            <a href="{{ url('admin/pembayaran-perpanjangan') }}" class="nav-link link-sidebar {{ (Request::is('admin/pembayaran-perpanjangan')) ? 'active' : '' }}">
              <svg class="bi me-2" width="16" height="16"><use xlink:href="#grid"/></svg>
              Pembayaran Perpanjangan SIM
            </a>
          </li>
          <li class="{{ (Request::is('admin/jadwal-kedatangan-pembuatan')) ? 'nav-item' : '' }}">
            <a href="{{ url('admin/jadwal-kedatangan-pembuatan') }}" class="nav-link link-sidebar {{ (Request::is('admin/jadwal-kedatangan-pembuatan')) ? 'active' : '' }}">
              <svg class="bi me-2" width="16" height="16"><use xlink:href="#grid"/></svg>
              Jadwal Kedatangan Pembuatan SIM
            </a>
          </li>
          <li>
          <li class="{{ (Request::is('admin/jadwal-kedatangan-perpanjangan')) ? 'nav-item' : '' }}">
            <a href="{{ url('admin/jadwal-kedatangan-perpanjangan') }}" class="nav-link link-sidebar {{ (Request::is('admin/jadwal-kedatangan-perpanjangan')) ? 'active' : '' }}">
              <svg class="bi me-2" width="16" height="16"><use xlink:href="#grid"/></svg>
              Jadwal Kedatangan Perpanjangan SIM
            </a>
          </li>
          <li class="{{ (Request::is('admin/berita')) ? 'nav-item' : '' }}">
            <a href="{{ url('admin/berita') }}" class="nav-link link-sidebar {{ (Request::is('admin/berita')) ? 'active' : '' }}">
                <svg class="bi me-2" width="16" height="16"><use xlink:href="#grid"/></svg>
                Berita
              </a>
          </li>
        </ul>
        <hr>
        <div class="dropdown">
            <a href="#" class="d-flex align-items-center link-dark text-decoration-none dropdown-toggle" id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">
                @if (Auth::guard('pegawai')->check())
                    <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
                    <strong>{{ Auth::guard('pegawai')->user()->name_pegawai }}</strong>
                @else
                    <script type="text/javascript">
                        window.location = "{{ route('adminlogin') }}"; // Replace 'adminlogin' with your actual route name
                    </script>
                @endif
            </a>

            @if (Auth::guard('pegawai')->check())
                <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2">
                    <li><a class="dropdown-item" href="#">New project...</a></li>
                    <li><a class="dropdown-item" href="#">Settings</a></li>
                    <li><a class="dropdown-item" href="#">Profile</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="{{ route('logoutadmin') }}">Sign out</a></li>
                </ul>
            @endif
        </div>

      </div>
    {{-- </div> --}}
      @yield('content')
    </main>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>
<script>
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
<script type="text/javascript" src="mdb/js/mdb.umd.min.js"></script>
<script
type="text/javascript"
src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.2.0/mdb.umd.min.js"
></script>
</html>
