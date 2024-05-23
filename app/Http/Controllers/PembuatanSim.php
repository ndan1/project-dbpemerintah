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
        return view('pembuatansim', compact('profile'));
    }

    public function store(Request $request){
        $profile = auth()->user();
        $requestData['id_customer'] = $request->id_customer;
        $fileName1 = time().$request->file('foto_ktp')->getClientOriginalName();
        $fileName2 = time().$request->file('pas_foto')->getClientOriginalName();
        $fileName3 = time().$request->file('surat_sehat')->getClientOriginalName();
        $path1 = $request->file('foto_ktp')->storeAs('images/pembuatansim/foto_ktp', $fileName1, 'public');
        $path2 = $request->file('pas_foto')->storeAs('images/pembuatansim/pas_foto', $fileName2, 'public');
        $path3 = $request->file('surat_sehat')->storeAs('images/pembuatansim/surat_sehat', $fileName3, 'public');
        $requestData["foto_ktp"] ='/storage/'.$path1;
        $requestData["pas_foto"] ='/storage/'.$path2;
        $requestData["surat_sehat"] ='/storage/'.$path3;
        BuatSim::create($requestData);
        return redirect('pembuatan-sim')->with('flash-message', 'Berhasil daftar');
    }
}
