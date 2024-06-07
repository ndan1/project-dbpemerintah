@extends('master')

@section('content')

{{-- <div class="alert alert-info">
    Mohon menunggu, permintaan Anda sedang diproses oleh admin.

</div> --}}
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

@endsection
