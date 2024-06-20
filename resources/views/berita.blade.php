@extends('master')

@section('content')
    <div class="d-flex justify-content-around flex-wrap">
        @foreach ($berita as $item)
            <div class="card mb-4" style="width: 22%; margin-right: 1%;">
                <img src="{{ $item->foto_berita }}" class="card-img-top" alt="{{ $item->judul_berita }}">
                <div class="card-body">
                    <h5 class="card-title">
                        <a href="{{ route('berita.show', $item->id_berita) }}">{{ $item->judul_berita }}</a>
                    </h5>
                    <p class="card-text">{{ Str::limit($item->isi_berita, 100, '...') }}</p>
                </div>
            </div>
        @endforeach
    </div>
@endsection
