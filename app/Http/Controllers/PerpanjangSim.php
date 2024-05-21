<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BuatSim;

class PembuatanSim extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function show() {
        $profile = auth()->user();
        return view('perpanjang-sim', compact('profile'));
    }

    public function store(Request $request){
        $profile = auth()->user();
        $requestData['id_customer'] = $request->id_customer;
        $fileName1 = time().$request->file('foto_ktp')->getClientOriginalName();
        $fileName2 = time().$request->file('pas_foto')->getClientOriginalName();
        $fileName3 = time().$request->file('surat_sehat')->getClientOriginalName();
        $path = $request->file('foto_ktp')->storeAs('images/foto_ktp', $fileName1, 'public');
        $path = $request->file('pas_foto')->storeAs('images/pas_foto', $fileName2, 'public');
        $path = $request->file('surat_sehat')->storeAs('images/surat_sehat', $fileName3, 'public');
        $requestData["foto_ktp"] ='/storage/'.$path;
        $requestData["pas_foto"] ='/storage/'.$path;
        $requestData["surat_sehat"] ='/storage/'.$path;
        BuatSim::create($requestData);
        return redirect('pembuatan-sim')->with('flash-message', 'Berhasil daftar');
    }
}
