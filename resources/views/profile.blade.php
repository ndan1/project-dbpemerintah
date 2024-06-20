@extends('master')

@section('content')
    @if ($errors->any())
        <div class="col-12">
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger">{{ $error }}</div>
            @endforeach
    @endif
    @if (session()->has('success'))
        <div class="modal fade" id="lengkapi-profile" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="waiting-quiz" aria-hidden="true">
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
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal"><a
                                href="{{ route('pembuatan-sim') }}">Pembuatan SIM</a></button>
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal"><a
                                href="{{ route('perpanjang-sim') }}">Perpanjangan SIM</a></button>

                    </div>
                </div>
            </div>
        </div>
    @endif
    @if (session()->has('message'))
        <div class="modal fade" id="lengkapi-profile" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="waiting-quiz" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Lengkapi Data</h1>
                    </div>
                    <div class="modal-body">
                        {{ session('message') }}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Lengkapi data</button>
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
          <div class="mb-3">
            <label for="gender" class="col-sm-2 col-form-label">Jenis Kelamin</label>
            <input type="radio" id="gender" value="L" name="gender" {{ ($profile->gender=="L")? "checked" : "" }}>
            <label for="gender">Laki-Laki</label>
            <input type="radio" id="gender" value="P" style="margin-left: 2vw;"  name="gender" {{ ($profile->gender=="P")? "checked" : "" }}>
            <label for="gender">Perempuan</label>
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
                <select class="form-control border-danger" id="provinsi" name="provinsi">
                    <option value="">Pilih Provinsi</option>
                    <option value="Aceh" {{ ($profile->provinsi ?? '') == 'Aceh' ? 'selected' : '' }}>Aceh</option>
                    <option value="Bali" {{ ($profile->provinsi ?? '') == 'Bali' ? 'selected' : '' }}>Bali</option>
                    <option value="Banten" {{ ($profile->provinsi ?? '') == 'Banten' ? 'selected' : '' }}>Banten</option>
                    <option value="Bengkulu" {{ ($profile->provinsi ?? '') == 'Bengkulu' ? 'selected' : '' }}>Bengkulu</option>
                    <option value="DI Yogyakarta" {{ ($profile->provinsi ?? '') == 'DI Yogyakarta' ? 'selected' : '' }}>DI Yogyakarta</option>
                    <option value="DKI Jakarta" {{ ($profile->provinsi ?? '') == 'DKI Jakarta' ? 'selected' : '' }}>DKI Jakarta</option>
                    <option value="Gorontalo" {{ ($profile->provinsi ?? '') == 'Gorontalo' ? 'selected' : '' }}>Gorontalo</option>
                    <option value="Jambi" {{ ($profile->provinsi ?? '') == 'Jambi' ? 'selected' : '' }}>Jambi</option>
                    <option value="Jawa Barat" {{ ($profile->provinsi ?? '') == 'Jawa Barat' ? 'selected' : '' }}>Jawa Barat</option>
                    <option value="Jawa Tengah" {{ ($profile->provinsi ?? '') == 'Jawa Tengah' ? 'selected' : '' }}>Jawa Tengah</option>
                    <option value="Jawa Timur" {{ ($profile->provinsi ?? '') == 'Jawa Timur' ? 'selected' : '' }}>Jawa Timur</option>
                    <option value="Kalimantan Barat" {{ ($profile->provinsi ?? '') == 'Kalimantan Barat' ? 'selected' : '' }}>Kalimantan Barat</option>
                    <option value="Kalimantan Selatan" {{ ($profile->provinsi ?? '') == 'Kalimantan Selatan' ? 'selected' : '' }}>Kalimantan Selatan</option>
                    <option value="Kalimantan Tengah" {{ ($profile->provinsi ?? '') == 'Kalimantan Tengah' ? 'selected' : '' }}>Kalimantan Tengah</option>
                    <option value="Kalimantan Timur" {{ ($profile->provinsi ?? '') == 'Kalimantan Timur' ? 'selected' : '' }}>Kalimantan Timur</option>
                    <option value="Kalimantan Utara" {{ ($profile->provinsi ?? '') == 'Kalimantan Utara' ? 'selected' : '' }}>Kalimantan Utara</option>
                    <option value="Kepulauan Bangka Belitung" {{ ($profile->provinsi ?? '') == 'Kepulauan Bangka Belitung' ? 'selected' : '' }}>Kepulauan Bangka Belitung</option>
                    <option value="Kepulauan Riau" {{ ($profile->provinsi ?? '') == 'Kepulauan Riau' ? 'selected' : '' }}>Kepulauan Riau</option>
                    <option value="Lampung" {{ ($profile->provinsi ?? '') == 'Lampung' ? 'selected' : '' }}>Lampung</option>
                    <option value="Maluku" {{ ($profile->provinsi ?? '') == 'Maluku' ? 'selected' : '' }}>Maluku</option>
                    <option value="Maluku Utara" {{ ($profile->provinsi ?? '') == 'Maluku Utara' ? 'selected' : '' }}>Maluku Utara</option>
                    <option value="Nusa Tenggara Barat" {{ ($profile->provinsi ?? '') == 'Nusa Tenggara Barat' ? 'selected' : '' }}>Nusa Tenggara Barat</option>
                    <option value="Nusa Tenggara Timur" {{ ($profile->provinsi ?? '') == 'Nusa Tenggara Timur' ? 'selected' : '' }}>Nusa Tenggara Timur</option>
                    <option value="Papua" {{ ($profile->provinsi ?? '') == 'Papua' ? 'selected' : '' }}>Papua</option>
                    <option value="Papua Barat" {{ ($profile->provinsi ?? '') == 'Papua Barat' ? 'selected' : '' }}>Papua Barat</option>
                    <option value="Riau" {{ ($profile->provinsi ?? '') == 'Riau' ? 'selected' : '' }}>Riau</option>
                    <option value="Sulawesi Barat" {{ ($profile->provinsi ?? '') == 'Sulawesi Barat' ? 'selected' : '' }}>Sulawesi Barat</option>
                    <option value="Sulawesi Selatan" {{ ($profile->provinsi ?? '') == 'Sulawesi Selatan' ? 'selected' : '' }}>Sulawesi Selatan</option>
                    <option value="Sulawesi Tengah" {{ ($profile->provinsi ?? '') == 'Sulawesi Tengah' ? 'selected' : '' }}>Sulawesi Tengah</option>
                    <option value="Sulawesi Tenggara" {{ ($profile->provinsi ?? '') == 'Sulawesi Tenggara' ? 'selected' : '' }}>Sulawesi Tenggara</option>
                    <option value="Sulawesi Utara" {{ ($profile->provinsi ?? '') == 'Sulawesi Utara' ? 'selected' : '' }}>Sulawesi Utara</option>
                    <option value="Sumatera Barat" {{ ($profile->provinsi ?? '') == 'Sumatera Barat' ? 'selected' : '' }}>Sumatera Barat</option>
                    <option value="Sumatera Selatan" {{ ($profile->provinsi ?? '') == 'Sumatera Selatan' ? 'selected' : '' }}>Sumatera Selatan</option>
                    <option value="Sumatera Utara" {{ ($profile->provinsi ?? '') == 'Sumatera Utara' ? 'selected' : '' }}>Sumatera Utara</option>
                </select>
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
