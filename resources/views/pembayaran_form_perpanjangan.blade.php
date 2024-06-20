@extends('master')

@section('content')

<div class="container mt-5">
    <h2>Unggah Bukti Pembayaran Perpanjangan SIM</h2>
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

@if(isset($rejectComment))
<div class="alert alert-danger">{{ $rejectComment }}</div>
@endif
@if(session('status') == 'pending')
    <div class="alert alert-info">Mohon menunggu, permintaan Anda sedang diproses oleh admin.</div>
@else
    <form action="{{ route('pembayaran-perpanjang.submit') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="perpanjang_sim_id" value="{{ $perpanjangSim->id_perpanjang }}">
        <input type="text" name="amount" value="{{ $amount }}" readonly>
        <h4 class="mt-4 mb-4">Transfer ke BCA 4821412234 a/n Samsat Kota Malang </h4>
        <div class="mb-3">
            <label for="payment_proof" class="form-label">Bukti Pembayaran:</label>
            <input type="file" class="form-control" id="payment_proof" name="payment_proof" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endif
@endsection
