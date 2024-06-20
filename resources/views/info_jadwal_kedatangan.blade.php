@extends('master')

@section('content')
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
@endsection
