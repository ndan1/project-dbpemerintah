@extends('admin.adminmaster')

@section('content')

<div>
    <div class="container-count-all">
        <div class="container-count-antrian">
            <h6 class="count-antrian-text">Pembuatan SIM</h6>
            <h6>{{$pembuatanSIM}}</h6>
        </div>
        <div class="container-count-antrian">
            <h6 class="count-antrian-text">Perpanjang SIM</h6>
            <h6>{{$perpanjangSIM}}</h6>
        </div>
        <div class="container-count-antrian">
            <h6 class="count-antrian-text">Pembayaran Pembuatan SIM</h6>
            <h6>{{$bayarPembuatan}}</h6>
        </div>
        <div class="container-count-antrian">
            <h6 class="count-antrian-text">Pembayaran Perpanjang SIM</h6>
            <h6>{{$bayarPerpanjang}}</h6>
        </div>
    </div>
  </div>

@endsection
