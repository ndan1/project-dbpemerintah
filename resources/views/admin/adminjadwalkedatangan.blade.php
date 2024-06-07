@extends('admin.adminmaster')

@section('content')
<div class="container mt-5">
    <h2>Daftar Jadwal Kedatangan Pembuatan SIM</h2>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama User</th>
                <th>Kebutuhan</th>
                <th>Tanggal Kedatangan</th>
                <th>Waktu</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($jadwalKedatangan as $jadwal)
                <tr>
                    <td>{{ $jadwal->kedatangan_id }}</td>
                    <td>{{ $jadwal->user->customer_name ?? 'N/A' }}</td>
                    <td>{{ $jadwal->id_pembuatan == NULL ? 'Perpanjangan SIM' : 'Pembuatan SIM' }}</td>
                    <td>{{ $jadwal->schedule_date }}</td>
                    <td>{{ $jadwal->schedule_time }}</td>
                    <td>{{ $jadwal->status }}</td>
                    <td>
                        <a href="{{ route('admin.jadwal-kedatangan.show', $jadwal->kedatangan_id) }}" class="btn btn-info">Detail</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $jadwalKedatangan->links() }}
</div>
@endsection
