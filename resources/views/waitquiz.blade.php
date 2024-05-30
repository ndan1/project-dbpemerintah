@extends('master')

@section('content')
<div class="modal fade" id="waiting-quiz" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="waiting-quiz" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Ujian Teori</h1>
            </div>
            <div class="modal-body">
                Data Anda sudah benar dan disetujui oleh admin. Selanjutnya Anda akan melakukan ujian teori secara online.
                Pastikan Anda telah siap dan jaringan Anda lancar selama mengerjakan ujian teori. Tekan tombol <strong>mulai</strong> untuk memulai ujian.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger"><a href="{{url('home')}}">Kembali</a></button>
                <button type="button" class="btn btn-success"><a href="{{url('pembuatan-sim/ujian-teori')}}">Mulai</a></button>
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
