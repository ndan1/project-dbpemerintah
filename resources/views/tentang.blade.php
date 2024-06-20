@extends('master')

@section('content')
    <div class="tentang d-flex flex-row mb-3 justify-content-around align-items-center">
        <div class="p-2">
            <p class="text-center">
                Nikmati kemudahan layanan Korlantas POLRI dalam satu aplikasi. <br>
            <ul>
                <li>Pendaftaran SIM Tak perlu ribet, kini proses pendaftaran dan ujian teori SIM dapat dilakukan dari rumah
                    secara online. Setelah seluruh persyaratan pendaftaran SIM terpenuhi, pilih jadwal kedatangan ke SATPAS
                    untuk melakukan ujian praktik.</li>
                <li>Perpanjangan SIM Tidak perlu antre, kini Anda dapat melakukan perpanjangan SIM secara online dengan
                    mudah dan cepat.</li>



            </ul>
            </p>
        </div>
        <div class="p-2">

            <img style="width: 100%" src="{{ asset('images/motor.png') }}" alt="">
        </div>
    </div>
    <div>
        <h1 class="text-center" style="padding: 100px 0 50px">Langkah Pembuatan SIM</h1>
        <div class="langkah d-flex justify-content-around">
            <div>

                <img src="{{ asset('images/lengkapi-data.png') }}" alt="">
                <h6 class="text-center">1. Lengkapi data diri</h6>
            </div>
            <div>

                <img src="{{ asset('images/isi-form.png') }}" alt="">
                <h6 class="text-center">2. Ajukan permohonan pembuatan SIM</h6>
            </div>
            <div>

                <img src="{{ asset('images/tes-online.png') }}" alt="">
                <h6 class="text-center">3. Lakukan ujian teori</h6>
            </div>
            <div>

                <img src="{{ asset('images/bayar.png') }}" alt="">
                <h6 class="text-center">4. Bayar dan pilih jadwal ujian praktek</h6>
            </div>
        </div>

        <h1 class="text-center" style="padding: 100px 0 50px">Langkah Perpanjangan SIM</h1>
        <div class="langkah d-flex justify-content-around" style="padding-bottom: 100px">
            <div>

                <img src="{{ asset('images/lengkapi-data.png') }}" alt="">
                <h6 class="text-center">1. Lengkapi data diri</h6>
            </div>
            <div>

                <img src="{{ asset('images/isi-form.png') }}" alt="">
                <h6 class="text-center">2. Ajukan permohonan perpanjang SIM</h6>
            </div>
            <div>

                <img src="{{ asset('images/bayar.png') }}" alt="">
                <h6 class="text-center">3. Bayar dan pilih jadwal pengambilan SIM</h6>
            </div>
        </div>
    </div>
@endsection
