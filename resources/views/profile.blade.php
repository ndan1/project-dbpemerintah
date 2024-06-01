@extends('master')

@section('content')
@if ($errors->any())
    <div class="col-12">
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger">{{ $error }}</div>
        @endforeach
@endif
@if (session()->has('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
@endif
@if (session()->has('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif
<div class="">
    <form class="mx-auto" style="width:80%; margin-top:50px" action="{{route('profile.update', ['customer_email' => Auth::user()->customer_email])}}" method="POST">
        @csrf
        <div>
            <h1 class="text-center" style="margin-bottom: 50px">Edit Profile</h1>
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
          <button style="margin: auto" type="submit" class="btn btn-primary text-center" style="height: 6vh;">Simpan</button>
    </form>
</div>
@endsection
