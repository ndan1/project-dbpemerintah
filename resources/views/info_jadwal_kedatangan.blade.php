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

@endsection



@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var myModal = new bootstrap.Modal(document.getElementById('waiting-quiz'));
        myModal.show();
    });
</script>
@endsection

