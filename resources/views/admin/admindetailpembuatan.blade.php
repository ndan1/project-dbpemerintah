@extends('admin.adminmaster')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-12" style="padding:20px;">
            <div class="card" style="width: 90%;">
                <div class="card-header">Detail Pembuatan SIM</div>
                <div class="card-body">
                    <p><strong>Nama:</strong> {{ $pembuatanSim->user->customer_name }}</p>
                    <p><strong>NIK:</strong> {{ $pembuatanSim->user->nik }}</p>
                    <div style="display: flex; justify-content:space-between">
                        <div>
                            <p><strong>Foto KTP:</strong></p>
                            <img src="{{ asset($pembuatanSim->foto_ktp) }}" width='300' height='300' class="img img-responsive clickable-image" data-bs-toggle="modal" data-bs-target="#fotoKTPModal"/>
                        </div>
                        <div>
                            <p><strong>Pas Foto:</strong></p>
                            <img src="{{ asset($pembuatanSim->pas_foto) }}" width='300' height='300' class="img img-responsive clickable-image" data-bs-toggle="modal" data-bs-target="#pasFotoModal"/>
                        </div>
                        <div>
                            <p><strong>Surat Sehat:</strong></p>
                            <img src="{{ asset($pembuatanSim->surat_sehat) }}" width='300' height='300' class="img img-responsive clickable-image" data-bs-toggle="modal" data-bs-target="#suratSehatModal"/>
                        </div>
                    </div>
                    <h4 class="text-center">Klik gambar untuk melihat lebih detail.</h4>
                    <div style="margin-top: 20px;">
                        <a href="{{ url('adminpembuatan') }}" class="btn btn-secondary">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modals for Images -->
<div class="modal fade" id="fotoKTPModal" tabindex="-1" aria-labelledby="fotoKTPModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="fotoKTPModalLabel">Foto KTP</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <img src="{{ asset($pembuatanSim->foto_ktp) }}" class="img-fluid"/>
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
                <img src="{{ asset($pembuatanSim->pas_foto) }}" class="img-fluid"/>
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
                <img src="{{ asset($pembuatanSim->surat_sehat) }}" class="img-fluid"/>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
    // You can add any custom JavaScript here if needed
</script>
@endsection
