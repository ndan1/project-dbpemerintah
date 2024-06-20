{{-- @extends('master')

@section('content')
<<<<<<< HEAD
    <div class="modal fade" id="waiting-quiz" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="waiting-quiz" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Detail Jadwal Kedatangan</h1>
                </div>
                <div class="modal-body">
                    <p class="card-text">Nama : {{$jadwalKedatangan->user->customer_name}}</p>
                    <p class="card-text">Tanggal : {{ \Carbon\Carbon::parse($jadwalKedatangan->schedule_date)->format('d/m/Y')}}</p>
                    <p class="card-text">Waktu : {{ $jadwalKedatangan->schedule_time}}</p>
                    <p class="card-text">Lokasi : Samsat Kota Malang, Klojen</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger"><a href="{{ url('home') }}" class="text-white">Kembali</a></button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var myModal = new bootstrap.Modal(document.getElementById('waiting-quiz'));
            myModal.show();
        });
    </script>
=======

<div class="text-center d-flex align-items-center justify-content-center" style="height: 88vh;">
    <div>
        <table>
            <tr>
                <td>Nama</td>
                <td>:</td>
                <td>{{$jadwalKedatangan->user->customer_name}}</td>
            </tr>
            <tr>
                <td>Tanggal</td>
                <td>:</td>
                <td>{{ \Carbon\Carbon::parse($jadwalKedatangan->schedule_date)->format('d/m/Y')}}</td>
            </tr>
            <tr>
                <td>Waktu</td>
                <td>:</td>
                <td>{{$jadwalKedatangan->schedule_time}}</td>
            </tr>
        </table>
    </div>
</div>

@endsection --}}
@extends('master')

@section('content')
<div class="modal fade" id="waiting-quiz" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="waiting-quiz" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Jadwal Kedatangan</h1>
            </div>
            <div class="modal-body">
                <div class="text-center d-flex align-items-center justify-content-center">
                    <div>
                        <table style="text-align: left">
                            <tr>
                                <td>Nama</td>
                                <td>:</td>
                                <td>{{$jadwalKedatangan->user->customer_name}}</td>
                            </tr>
                            <tr>
                                <td>Tanggal</td>
                                <td>:</td>
                                <td>{{ \Carbon\Carbon::parse($jadwalKedatangan->schedule_date)->format('d/m/Y')}}</td>
                            </tr>
                            <tr>
                                <td>Waktu</td>
                                <td>:</td>
                                <td>{{$jadwalKedatangan->schedule_time}}</td>
                            </tr>
                            <tr>
                                <td>Lokasi</td>
                                <td>:</td>
                                <td>SAMSAT Kota Malang, Jl. S. Supriadi No.80, Kebonsari, Kec. Sukun, Kota Malang, Jawa Timur 65117</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger"><a href="{{url('home')}}">Kembali</a></button>
            </div>
        </div>
    </div>
</div>

>>>>>>> 71fe82f9ac92976ef06c90359c513193a0ef4ee1
@endsection



@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var myModal = new bootstrap.Modal(document.getElementById('waiting-quiz'));
        myModal.show();
    });
</script>
@endsection

