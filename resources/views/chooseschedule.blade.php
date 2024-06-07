@extends('master')

@section('content')
<div class="container mt-5">
    <h2>Pilih Jadwal Kedatangan dan Unggah Bukti Pembayaran</h2>
    <form action="{{ route('schedule.submit') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="schedule_date" class="form-label">Tanggal Kedatangan:</label>
            <input type="date" class="form-control" id="schedule_date" name="schedule_date" required>
        </div>
        <div class="mb-3">
            <label for="schedule_time" class="form-label">Waktu Kedatangan:</label>
            <select class="form-select" id="schedule_time" name="schedule_time" required>
                <option value="08:00">08:00 - 09:00</option>
                <option value="09:00">09:00 - 10:00</option>
                <!-- Tambahkan opsi waktu kedatangan lainnya sesuai kebutuhan -->
            </select>
        </div>
        <div class="mb-3">
            <label for="payment_proof" class="form-label">Bukti Pembayaran:</label>
            <input type="file" class="form-control" id="payment_proof" name="payment_proof" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
