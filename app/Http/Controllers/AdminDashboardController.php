<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BuatSim;
use App\Models\PanjangSim;
use App\Models\Pembayaran;
use App\Models\PembayaranPerpanjangan;

class AdminDashboardController extends Controller
{
    public function hitungPembuatanSIM() {
        $pembuatanSIM = BuatSim::where('status', 'pending')->count();
        $perpanjangSIM = PanjangSim::where('status', 'pending')->count();
        $bayarPembuatan = Pembayaran::where('status', 'pending')->count();
        $bayarPerpanjang = BuatSim::where('status', 'pending')->count();
        return view('admin.adminhome', [
            'pembuatanSIM' => $pembuatanSIM,
            'perpanjangSIM' => $perpanjangSIM,
            'bayarPembuatan' => $bayarPembuatan,
            'bayarPerpanjang' => $bayarPerpanjang
        ]);
    }
}
