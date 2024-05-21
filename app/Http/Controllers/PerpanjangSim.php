<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BuatSim;
use App\Models\PanjangSim;

class PerpanjangSim extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function show() {
        $profile = auth()->user();
        return view('perpanjangsim', compact('profile'));
    }

    public function store(Request $request){
        // $profile = auth()->user();
        $requestData['id_customer'] = $request->id_customer;
        $fileName1 = time().$request->file('foto_ktp')->getClientOriginalName();
        $fileName2 = time().$request->file('pas_foto')->getClientOriginalName();
        $fileName3 = time().$request->file('surat_sehat')->getClientOriginalName();
        $fileName4 = time().$request->file('foto_sim')->getClientOriginalName();
        $path = $request->file('foto_ktp')->storeAs('images/perpanjangsim/foto_ktp', $fileName1, 'public');
        $path = $request->file('pas_foto')->storeAs('images/perpanjangsim/pas_foto', $fileName2, 'public');
        $path = $request->file('surat_sehat')->storeAs('images/perpanjangsim/surat_sehat', $fileName3, 'public');
        $path = $request->file('foto_sim')->storeAs('images/perpanjangsim/foto_sim', $fileName4, 'public');
        $requestData["foto_ktp"] ='/storage/'.$path;
        $requestData["pas_foto"] ='/storage/'.$path;
        $requestData["surat_sehat"] ='/storage/'.$path;
        $requestData["foto_sim"] ='/storage/'.$path;
        PanjangSim::create($requestData);
        return redirect('perpanjang-sim')->with('flash-message', 'Berhasil Daftar Perpanjang SIM');
    }
}
