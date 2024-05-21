@extends('master')

@section('content')

@if ($errors->any())
                        <div class="col-12">
                            @foreach ($errors->all() as $error)
                                <div class="alert alert-danger">{{ $error }}</div>
                            @endforeach
                        </div>

                    @endif
                    @if (session()->has('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif
    <div class="form-container">
    <form action="{{route('buat-sim')}}" method="POST" enctype="multipart/form-data" class="">
        @csrf
        <div class="mb-3 mt-3 text-center">
            <h1>Pembuatan SIM</h1>
        </div>
        <div class="mb-3 row">
            <label for="namalengkap" class="col-sm-2 col-form-label">Nama</label>
            <div class="col-sm-10">
              <input type="text" id="namalengkap" name="customer_name" value="{{$profile->customer_name ?? ''}}" disabled>
            </div>
            {{-- input id_customer for send to database --}}
            <input type="text" id="id_customer" name="id_customer" value="{{$profile->customer_id ?? ''}}" style="display: none;">
          </div>
          <div class="mb-3 row">
            <label for="foto_ktp" class="col-sm-2 col-form-label">Foto KTP</label>
            <div class="col-sm-10">
              <input type="file" class="form-control" id="foto_ktp" name="foto_ktp">
            </div>
          </div>
          <div class="mb-3 row">
            <label for="pas_foto" class="col-sm-2 col-form-label">Pas Foto</label>
            <div class="col-sm-10">
              <input type="file" class="form-control" id="pas_foto" name="pas_foto">
            </div>
          </div>
          <div class="mb-3 row">
            <label for="surat_sehat" class="col-sm-2 col-form-label">Surat Sehat</label>
            <div class="col-sm-10">
              <input type="file" class="form-control" id="surat_sehat" name="surat_sehat">
            </div>
          </div>
          <button type="submit" class="btn btn-primary" style="height: 6vh;">Simpan</button>
    </form>
    </div>
    @endsection
