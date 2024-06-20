@extends('master')

@section('content')
    <div class="container mt-4">
        <div class="card">
            <img src="{{ asset($berita->foto_berita) }}" class="card-img-top" alt="{{ $berita->judul_berita }}" style="max-width: 400px; margin: auto;">
            <div class="card-body">
                <h1 class="card-title">{{ $berita->judul_berita }}</h1>
                <p class="card-text">{{ $berita->isi_berita }}</p>
                <a href="{{ route('show.berita.masyarakat') }}" class="btn btn-primary">Back</a>
            </div>
        </div>
    </div>
@endsection
