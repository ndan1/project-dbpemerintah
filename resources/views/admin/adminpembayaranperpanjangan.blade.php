@extends('admin.adminmaster')

@section('content')
<div class="container mt-5">
    <h2>Daftar Pembayaran Perpanjangan SIM</h2>
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
                <th>Jumlah</th>
                <th>Status</th>
                <th>Tanggal</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pembayaran as $payment)
                <tr>
                    <td>{{ $payment->pembayaranperpanjang_id }}</td>
                    <td>{{ $payment->user->customer_name ?? 'N/A' }}</td>
                    <td>{{ $payment->amount }}</td>
                    <td>{{ $payment->status }}</td>
                    <td>{{ $payment->created_at }}</td>
                    <td>
                        <a href="{{ route('admin.pembayaranperpanjangan.show', $payment->pembayaranperpanjang_id) }}" class="btn btn-info">Detail</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $pembayaran->links() }}
</div>
@endsection
