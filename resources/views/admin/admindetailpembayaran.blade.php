@extends('admin.adminmaster')

@section('content')
<div class="container mt-5">
    <h2>Detail Pembayaran Pembuatan SIM</h2>
    <div class="card">
        <div class="card-header">
            Pembayaran ID: {{ $pembayaran->pembayaran_id }}
        </div>
        <div class="card-body">
            <p><strong>Nama User:</strong> {{ $pembayaran->user->customer_name ?? 'N/A' }}</p>
            <p><strong>Jumlah:</strong> {{ $pembayaran->amount }}</p>
            <p><strong>Status:</strong> {{ $pembayaran->status }}</p>
            <p><strong>Tanggal:</strong> {{ $pembayaran->created_at }}</p>
            <p><strong>Bukti Pembayaran:</strong></p>
            <img src="{{ asset('storage/' . $pembayaran->payment_proof) }}" alt="Bukti Pembayaran" class="img-fluid">
            <form action="{{ route('admin.pembayaran.approve', $pembayaran->pembayaran_id) }}" method="POST" class="mt-3">
                @csrf
                <button type="submit" class="btn btn-success">Approve</button>
            </form>
            <form action="{{ route('admin.pembayaran.reject', $pembayaran->pembayaran_id) }}" method="POST" class="mt-3">
                @csrf
                <div class="mb-3">
                    <label for="comments" class="form-label">Komentar:</label>
                    <textarea class="form-control" id="comments" name="comments" required></textarea>
                </div>
                <button type="submit" class="btn btn-danger">Reject</button>
            </form>
        </div>
    </div>
</div>

@endsection
