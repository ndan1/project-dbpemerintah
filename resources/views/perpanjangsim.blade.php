@extends('master')

@section('content')
    @if ($errors->any())
        <div class="col-12">
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger">{{ $error }}</div>
            @endforeach
        </div>,
    @endif

    @if (session()->has('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    @if (isset($rejectComment))
        <div class="alert alert-danger">{{ $rejectComment }}</div>
    @endif
    @if (session('status') == 'pending')
        <div class="alert alert-info">Mohon menunggu, permintaan Anda sedang diproses oleh admin.</div>
    @else
        <form class="mx-auto" action="{{ route('panjang-sim') }}" method="POST" enctype="multipart/form-data"
            style="width: 80%;">
            @csrf
            <div class="mb-3 mt-3">
                <h1 class="text-center" style="margin:60px 0">Perpanjangan SIM</h1>
            </div>
            <div class="mb-3 row">
                <label for="namalengkap" class="col-sm-2 col-form-label">Nama Lengkap</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control border-danger" id="namalengkap" name="customer_name"
                        value="{{ $profile->customer_name ?? '' }}" disabled>
                </div>
                {{-- input id_customer for send to database --}}
                <input type="text" id="id_customer" name="id_customer" value="{{ $profile->customer_id ?? '' }}"
                    style="display: none;">
            </div>
            <div class="mb-3 row">
                <label for="tipe_sim" class="col-sm-2 col-form-label">Tipe SIM</label>
                <div class="col-sm-10">
                    <select class="form-control border-danger" id="tipe_sim" name="tipe_sim">
                        <option value="A">SIM A</option>
                        <option value="C">SIM C</option>
                    </select>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="foto_ktp" class="col-sm-2 col-form-label">Foto KTP</label>
                <div class="col-sm-10">
                    <input type="file" class="form-control border-danger" id="foto_ktp" name="foto_ktp">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="foto_ktp" class="col-sm-2 col-form-label">Foto SIM lama</label>
                <div class="col-sm-10">
                    <input type="file" class="form-control border-danger" id="foto_ktp" name="foto_ktp">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="pas_foto" class="col-sm-2 col-form-label">Pas Foto</label>
                <div class="col-sm-10">
                    <input type="file" class="form-control border-danger" id="pas_foto" name="pas_foto">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="surat_sehat" class="col-sm-2 col-form-label">Surat Sehat</label>
                <div class="col-sm-10">
                    <input type="file" class="form-control border-danger" id="surat_sehat" name="surat_sehat">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="foto_sim" class="col-sm-2 col-form-label">Foto SIM</label>
                <div class="col-sm-10">
                    <input type="file" class="form-control border-danger" id="foto_sim" name="foto_sim">
                </div>
            </div>
            <button type="submit" class="btn btn-primary text-end" style="height: 6vh;">Simpan</button>
        </form>
        @endif
    @endsection
