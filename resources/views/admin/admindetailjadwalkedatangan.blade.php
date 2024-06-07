@extends('admin.adminmaster')

@section('content')
<div class="container mt-5">
    <h2>Detail Jadwal Kedatangan</h2>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="card">
        <div class="card-header">
            Detail Kedatangan ID: {{ $jadwal->kedatangan_id }}
        </div>
        <div class="card-body">
            <p><strong>Nama User:</strong> {{ $jadwal->user->customer_name ?? 'N/A' }}</p>
            <p><strong>Tanggal Kedatangan:</strong> {{ $jadwal->schedule_date }}</p>
            <p><strong>Waktu Kedatangan:</strong> {{ $jadwal->schedule_time }}</p>
            <p><strong>Status:</strong> {{ $jadwal->status }}</p>
            <p><strong>Jumlah Gagal:</strong> {{ $jadwal->attempt_count }}</p>
            {{-- <form action="{{ route('admin.jadwal.updateStatus', $jadwal->kedatangan_id) }}" method="POST"> --}}
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <label for="status">Status:</label>
                    <form action="{{ route('jadwal-kedatangan.pass', $jadwal->kedatangan_id) }}" method="POST" class="mt-3">
                        @csrf
                        <button type="submit" class="btn btn-success">Lolos</button>
                    </form>
                    <form action="{{ route('jadwal-kedatangan.fail', $jadwal->kedatangan_id) }}" method="POST" class="mt-3">
                        @csrf
                        <button type="submit" class="btn btn-success">Gagal</button>
                    </form>
                    {{-- <select name="status" id="status" class="form-control">
                        <option value="lolos" {{ $jadwal->status == 'lolos' ? 'selected' : '' }}>Lolos</option>
                        <option value="gagal" {{ $jadwal->status == 'gagal' ? 'selected' : '' }}>Gagal</option>
                    </select> --}}
                </div>
                {{-- <button type="submit" class="btn btn-primary mt-3">Update Status</button> --}}
            {{-- </form> --}}
        </div>
    </div>
</div>
@endsection
