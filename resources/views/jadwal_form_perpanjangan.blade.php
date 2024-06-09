@extends('master')

@section('content')
    <div class="container mt-5">
        <h2>Pilih Jadwal Kedatangan Perpanjangan SIM</h2>
        <form action="{{ route('jadwal-kedatangan-perpanjang.submit') }}" method="POST">
            @csrf
            <input type="hidden" name="perpanjang_sim_id" value="{{ $perpanjangSim->id_perpanjang }}">
            <div class="mb-3">
                <label for="schedule_date" class="form-label">Tanggal Kedatangan:</label>
                <input type="date" class="form-control" id="schedule_date" name="schedule_date" required>
            </div>
            <div class="mb-3">
                <label for="schedule_time" class="form-label">Waktu Kedatangan:</label>
                <input type="time" class="form-control" id="schedule_time" name="schedule_time" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
