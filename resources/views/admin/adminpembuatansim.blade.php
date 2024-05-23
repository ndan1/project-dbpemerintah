@extends('admin.adminmaster')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-12" style="padding:20px;">
            <div class="card">
                <div class="card-header">Antrian Pembuatan SIM</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr >
                                    <th style="width: 5vw;">ID</th>
                                    <th style="width: 15vw;">Nama</th>
                                    <th style="width: 15vw;">Foto KTP</th>
                                    <th style="width: 15vw;">Pas Foto</th>
                                    <th style="width: 15vw;">Surat Sehat</th>
                            </thead>
                            <tbody>
                            @foreach($pembuatansim as $item)
                                <tr>
                                    <td>{{ $item->id_pembuatan }}</td>
                                    <td style="width: 15vw;">{{ $item->user->customer_name }}</td>
                                    <td style="width: 15vw;"><img src="{{ asset($item->foto_ktp) }}" width= '50' height='50' class="img img-responsive" /></td>
                                    <td style="width: 15vw;"><img src="{{ asset($item->pas_foto) }}" width= '50' height='50' class="img img-responsive" /></td>
                                    <td style="width: 15vw;">
                                        <img src="{{ asset($item->surat_sehat) }}" width= '50' height='50' class="img img-responsive" />
                                    </td>
                                    <td style="width: 15vw;">
                                        <button>Hei</button>
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
</div>

@endsection
