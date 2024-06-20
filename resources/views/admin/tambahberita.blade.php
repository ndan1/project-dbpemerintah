@extends('admin.adminmaster')

@section('content')
<form action="{{route('buat.berita')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="d-flex flex-column p-5 row-gap-3 mx-auto row-gap-3" style="justify-content: center">
        <h1 class="mx-auto">Tambahkan Berita</h1>
        <div class="p-2 g-col-6 mx-auto">
            <div class="form-outline" data-mdb-input-init>
                <textarea class="form-control" name="judul_berita" id="textAreaExample" rows="3" cols="100"></textarea>
                <label class="form-label" for="textAreaExample">Judul Berita</label>
              </div>
            </div>
        <div class="p-2 g-col-6 mx-auto">
            <div class="form-outline" data-mdb-input-init>
                <textarea class="form-control" name="isi_berita" id="textAreaExample" rows="15" cols="100"></textarea>
                <label class="form-label" for="textAreaExample">Isi Berita</label>
              </div>
            </div>
            <div class="mb-3 row">
                <label for="foto_berita" class="col-sm-2 col-form-label">Foto Berita</label>
                <div class="col-sm-10">
                    <input type="file" class="form-control" id="foto_berita" name="foto_berita">
                </div>
            </div>


        <div class="p-2 g-col-6 mx-auto">
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </div>

</form>
@endsection
