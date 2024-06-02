@extends('master')

@section('content')
@if ($errors->any())
    <div class="col-12">
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger">{{ $error }}</div>
        @endforeach
@endif
@if (session()->has('success'))
<div class="modal fade" id="lengkapi-profile" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="waiting-quiz" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Data sudah lengkap</h1>
            </div>
            <div class="modal-body">
                Anda dapat melanjutkan proses pembuatan atau perpanjangan SIM
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal"><a href="{{ route('pembuatan-sim') }}">Pembuatan SIM</a></button>
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal"><a href="{{ route('perpanjang-sim') }}">Perpanjangan SIM</a></button>

            </div>
        </div>
    </div>
</div>
@endif
@if(session()->has('message'))
<div class="modal fade" id="lengkapi-profile" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="waiting-quiz" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Lengkapi Data</h1>
            </div>
            <div class="modal-body">
                {{session('message')}}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Lengkapi data</button>
            </div>
        </div>
    </div>
</div>
@endif
<div class="">
    <form class="mx-auto" style="width:80%; margin-top:50px" action="{{route('profile.update', ['customer_email' => Auth::user()->customer_email])}}" method="POST">
        @csrf
        <div>
            <h1 class="text-center" style="margin-bottom: 20px">Data</h1>
        </div>
        <div class="mb-3 row">
            <label for="namalengkap" class="col-sm-2 col-form-label">Nama Lengkap</label>
            <div class="col-sm-10">
              <input type="text" class="form-control border-danger" id="namalengkap" name="customer_name" value="{{$profile->customer_name ?? ''}}">
              <input type="email" id="customer_email" name="customer_email" value="{{$profile->customer_email ?? ''}}" style="display: none;" readonly>
              <input type="password" id="password" name="password" style="display: none;" readonly>
            </div>
          </div>
          <div class="mb-3 row">
            <label for="tempat_lahir" class="col-sm-2 col-form-label">Tempat Lahir</label>
            <div class="col-sm-10">
              <input type="text" class="form-control border-danger" id="tempat_lahir" name="tempat_lahir" value="{{$profile->tempat_lahir ?? ''}}">
            </div>
          </div>

          <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Tanggal Lahir</label>
            <div class="col-sm-10">
              <input type="date" class="form-control border-danger" id="tgl_lahir" name="tgl_lahir" value="{{$profile->tgl_lahir ?? ''}}">
            </div>
          </div>
          <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">NIK</label>
            <div class="col-sm-10">
              <input type="text" class="form-control border-danger" id="inputPassword" name="nik" value="{{$profile->nik ?? ''}}">
            </div>
          </div>
          <div class="mb-3 row">
            <label for="goldar" class="col-sm-2 col-form-label">Golongan Darah</label>
            <div class="col-sm-10">
                <select class="form-control border-danger form-select" id="goldar" name="goldar">
                    <option value="O" {{ ($profile->goldar == "O") ? "selected" : "" }}>O</option>
                    <option value="AB" {{ ($profile->goldar == "AB") ? "selected" : "" }}>AB</option>
                    <option value="A" {{ ($profile->goldar == "A") ? "selected" : "" }}>A</option>
                    <option value="B" {{ ($profile->goldar == "B") ? "selected" : "" }}>B</option>
                </select>
            </div>
        </div>
          <div class="mb-3">
            <label for="gender" class="col-sm-2 col-form-label">Jenis Kelamin</label>
            <input type="radio" id="gender" value="L" name="gender" {{ ($profile->gender=="L")? "checked" : "" }}>
            <label for="gender">Laki-Laki</label>
            <input type="radio" id="gender" value="P" style="margin-left: 2vw;"  name="gender" {{ ($profile->gender=="P")? "checked" : "" }}>
            <label for="gender">Perempuan</label>
          </div>

          <div class="mb-3 row">
            <label for="pekerjaan" class="col-sm-2 col-form-label">Pekerjaan</label>
            <div class="col-sm-10">
                <select class="form-control border-danger form-select" id="pekerjaan" name="pekerjaan">
                    <option value="Pelajar/mhs" {{ ($profile->pekerjaan == "Pelajar/mhs") ? "selected" : "" }}>Pelajar/mhs</option>
                    <option value="Karyawan Swasta" {{ ($profile->pekerjaan == "Karyawan Swasta") ? "selected" : "" }}>Karyawan Swasta</option>
                    <option value="Wiraswasta" {{ ($profile->pekerjaan == "Wiraswasta") ? "selected" : "" }}>Wiraswasta</option>
                    <option value="Wirausaha" {{ ($profile->pekerjaan == "Wirausaha") ? "selected" : "" }}>Wirausaha</option>
                </select>
            </div>
        </div>
          <div class="mb-3 row">
            <label for="alamat" class="col-sm-2 col-form-label">Alamat Sesuai KTP</label>
            <div class="col-sm-10">
              <input type="text" class="form-control border-danger" id="alamat" name="alamat" value="{{$profile->alamat ?? ''}}">
            </div>
          </div>
          <div class="mb-4 row">
            <label for="provinsi" class="col-sm-2 col-form-label">Provinsi</label>
            <div class="col-sm-10">
              <input type="text" class="form-control border-danger" id="provinsi" name="provinsi" value="{{$profile->provinsi ?? ''}}">
            </div>
          </div>
          <div class="text-center">
              <button style="margin: auto" type="submit" class="btn btn-primary text-center" style="height: 6vh;">Simpan</button>
            </div>
    </form>
</div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var myModal = new bootstrap.Modal(document.getElementById('lengkapi-profile'));
        myModal.show();
    });
</script>
@endsection
