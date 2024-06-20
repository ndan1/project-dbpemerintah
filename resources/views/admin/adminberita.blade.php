@extends('admin.adminmaster')

@section('content')
    <div>
        <button class="btn btn-success"><a href="{{route('createBerita')}}">Tambah Berita</a></button>
    </div>
    <div class="d-flex justify-content-around flex-wrap">
        @foreach ($berita as $item)
            <div class="card mb-4" style="width: 40%;height:400px; margin-right: 1%;">
                <img src="{{ $item->foto_berita }}" class="card-img-top" alt="{{ $item->judul_berita }}">
                <div class="card-body">
                    <h5 class="card-title">
                        <a href="{{ route('edit.berita', $item->id_berita) }}">{{ $item->judul_berita }}</a>
                    </h5>
                    <p class="card-text">{{ Str::limit($item->isi_berita, 100, '...') }}</p>
                </div>
            <button class="btn btn-primary">Edit</button>
            <button class="btn btn-danger">Hapus</button>
            </div>
        @endforeach
    </div>
@endsection
