@extends('admin.adminmaster')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-12" style="padding:10px;">
            <div class="card" style="width: 90%;">
                <div class="card-header">Detail Perpanjang SIM</div>
                <div class="card-body">
                    <div class="d-flex" style="justify-content: space-around">
                        <p><strong>ID:</strong> {{ $perpanjangSim->id_perpanjang }}</p>
                        <p><strong>Nama:</strong> {{ $perpanjangSim->user->customer_name }}</p>
                        <p><strong>Tipe SIM:</strong> {{ $perpanjangSim->tipe_sim }}</p>
                        <p><strong>Status:</strong> {{ $perpanjangSim->status }}</p>
                    </div>
                    <div style="display: flex; justify-content:space-between">
                        <div>
                            <p><strong>Foto KTP:</strong></p>
                            <img src="{{ asset($perpanjangSim->foto_ktp) }}" width='200' height='200' class="img img-responsive clickable-image" data-bs-toggle="modal" data-bs-target="#fotoKTPModal"/>
                        </div>
                        <div>
                            <p><strong>Pas Foto:</strong></p>
                            <img src="{{ asset($perpanjangSim->pas_foto) }}" width='200' height='200' class="img img-responsive clickable-image" data-bs-toggle="modal" data-bs-target="#pasFotoModal"/>
                        </div>
                        <div>
                            <p><strong>Surat Sehat:</strong></p>
                            <img src="{{ asset($perpanjangSim->surat_sehat) }}" width='200' height='200' class="img img-responsive clickable-image" data-bs-toggle="modal" data-bs-target="#suratSehatModal"/>
                        </div>
                        <div>
                            <p><strong>Foto SIM:</strong></p>
                            <img src="{{ asset($perpanjangSim->foto_sim) }}" width='200' height='200' class="img img-responsive clickable-image" data-bs-toggle="modal" data-bs-target="#suratSehatModal"/>
                        </div>
                    </div>
                    <h4 class="text-center">Klik gambar untuk melihat lebih detail.</h4>
                    <div style="margin-top: 20px;">
                        <a href="{{ route('adminperpanjang') }}" class="btn btn-secondary">Back</a>
                    </div>
                    @if($perpanjangSim->status == 'pending')
                        <form action="{{ route('admin.perpanjang-sim.approve', $perpanjangSim->id_perpanjang) }}" method="POST" style="display:inline;">
                            @csrf
                            <button type="submit" class="btn btn-success">Approve</button>
                        </form>
                        <form action="{{ route('admin.perpanjang-sim.reject', $perpanjangSim->id_perpanjang) }}" method="POST" style="display:inline;">
                            @csrf
                            <div class="form-group">
                                <label for="comments">Comments</label>
                                <textarea name="comments" id="comments" rows="3" class="form-control"></textarea>
                            </div>
                            <button type="submit" class="btn btn-danger">Reject</button>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="fotoKTPModal" tabindex="-1" aria-labelledby="fotoKTPModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="fotoKTPModalLabel">Foto KTP</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <img src="{{ asset($perpanjangSim->foto_ktp) }}" class="img-fluid"/>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="pasFotoModal" tabindex="-1" aria-labelledby="pasFotoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="pasFotoModalLabel">Pas Foto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <img src="{{ asset($perpanjangSim->pas_foto) }}" class="img-fluid"/>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="suratSehatModal" tabindex="-1" aria-labelledby="suratSehatModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="suratSehatModalLabel">Surat Sehat</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <img src="{{ asset($perpanjangSim->surat_sehat) }}" class="img-fluid"/>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="suratSehatModal" tabindex="-1" aria-labelledby="suratSehatModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="suratSehatModalLabel">Foto SIM</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <img src="{{ asset($perpanjangSim->foto_sim) }}" class="img-fluid"/>
            </div>
        </div>
    </div>
</div>

@endsection
