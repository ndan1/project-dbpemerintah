@extends('admin.adminmaster')

@section('content')

<div class="container" style="width:70%;margin-left: 100px">
    <div class="row">
        <div class="col-15" style="padding:10px;">
            <div class="card" style="width: 100%;">
                <div class="card-header">Antrian Pembuatan SIM</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nama</th>
                                    <th>Foto KTP</th>
                                    <th>Pas Foto</th>
                                    <th>Surat Sehat</th>
                                    <th>Tipe SIM</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($pembuatansim as $item)
                                <tr>
                                    <td>{{ $item->id_pembuatan }}</td>
                                    <td>{{ $item->user->customer_name }}</td>
                                    <td><img src="{{ asset($item->foto_ktp) }}" width= '50' height='50' class="img img-responsive" /></td>
                                    <td><img src="{{ asset($item->pas_foto) }}" width= '50' height='50' class="img img-responsive" /></td>
                                    <td><img src="{{ asset($item->surat_sehat) }}" width= '50' height='50' class="img img-responsive" /></td>
                                    <td>{{ $item->tipe_sim }}</td>
                                    <td>{{ $item->status }}</td>
                                    <td>
                                        <a href="{{ route('admin.pembuatan-sim.show', $item->id_pembuatan) }}" class="btn btn-primary">Detail</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="text-center">
                        {{ $pembuatansim->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
