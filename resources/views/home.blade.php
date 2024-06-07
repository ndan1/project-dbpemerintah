@extends('master')

@section('content')
@if (session()->has('fail'))
                        <div class="alert alert-danger">{{ session('fail') }}</div>
                    @endif
<div class="home-jumbotron">
    {{-- <div class="typewriter">
        <h1>Selamat Datang di Website Pemerintah Kota Malang</h1>
        <span>Selamat Datang di Website Pemerintah Kota Malang</span>
    </div> --}}
    <div class="container-home">
        <div class="typewriter">
            <h1>Selamat Datang di Website Pemerintah Kota Malang</h1>
        </div>
        <div class="home-text mt-4">
            <h2>MALANG KUCECWARA</h2>
            <p>-Tuhan menghancurkan yang bathil, menegakkan yang benar-</p>
        </div>
        <div class="home-paragraph mt-4">
            <p>
                Selamat datang di Website Resmi Kota Malang - Temukan informasi terkini,
                layanan publik, dan kemudahan pengurusan SIM dalam satu platform yang mudah diakses.
            </p>
        </div>
    </div>
    {{-- <div class="home-content" style="border: 2px solid black">
        <div class="home-img">
            <img src="{{asset('images/Logo_Kota_Malang.png')}}" alt="Logo Kota Malang">
        </div>
        <div class="home-text">
            <h2>MALANG KUCECWARA</h2>
        </div>
    </div> --}}
</div>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const typewriter = document.querySelector('.typewriter');
        setTimeout(() => {
            typewriter.classList.add('typing-complete');
        }, 4100); // 4s for typing + 1s delay
    });
</script>

@endsection
