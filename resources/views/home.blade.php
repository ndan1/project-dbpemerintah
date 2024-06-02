@extends('master')

@section('content')

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
</div>
    <div class="malang" style="background-color: white">
        <h1 class="text-center">Julukan Kota Malang</h1>
        <div class="d-flex flex-row justify-content-evenly mb-3">
            <div class="p-2 gambar-mlg text-center">
                <img src="{{asset('images/kota-malang.jpg')}}" alt="">
                <h6>Kota Sejarah</h6>
            </div>
            <div class="p-2 gambar-mlg text-center">
                <img src="{{asset('images/kota-industri.jpg')}}" alt="">
                <h6>Kota Industri</h6>
            </div>
            <div class="p-2 gambar-mlg text-center">
                <img src="{{asset('images/kota-bunga.jpg')}}" alt="">
                <h6>Kota Bunga</h6>
            </div>
        </div>
        <div class="d-flex flex-row justify-content-evenly mb-3">
            <div class="p-2 gambar-mlg text-center">
                <img src="{{asset('images/kota-pendidikan.jpg')}}" alt="">
                <h6>Kota Pendidikan</h6>
            </div>
            <div class="p-2 gambar-mlg text-center">
                <img src="{{asset('images/kota-wisata.jpg')}}" alt="">
                <h6>Kota Wisata</h6>
            </div>
            <div class="p-2 gambar-mlg text-center">
                <img src="{{asset('images/kota-apel.jpg')}}" alt="">
                <h6>Kota Apel</h6>
            </div>
          </div>
    </div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const typewriter = document.querySelector('.typewriter');
        setTimeout(() => {
            typewriter.classList.add('typing-complete');
        }, 4100);
    });
</script>

@endsection
