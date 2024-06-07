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
        $latestRequest = PanjangSim::where('id_customer', $profile->customer_id)->latest()->first();
        // dd($latestRequest);

        // Cek status persetujuan permintaan terbaru
        if ($latestRequest) {
            if ($latestRequest->status == 'approved') {
                return redirect('perpanjang-sim/pembayaran');
            }elseif ($latestRequest->status == 'rejected') {
                $rejectComment = $latestRequest->comments;
                return view('perpanjangsim', compact('profile', 'rejectComment'));
            } else {
                // return view('pembuatansim', compact('profile'));
                return view('menunggu_respon_admin');
            }
        } else {
            return view('perpanjangsim', compact('profile'));
        }
    }

    public function store(Request $request){
        // $profile = auth()->user();
        $requestData['id_customer'] = $request->id_customer;
        $requestData['tipe_sim'] = $request->tipe_sim;
        $requestData['status'] = 'pending';
        $fileName1 = time().$request->file('foto_ktp')->getClientOriginalName();
        $fileName2 = time().$request->file('pas_foto')->getClientOriginalName();
        $fileName3 = time().$request->file('surat_sehat')->getClientOriginalName();
        $fileName4 = time().$request->file('foto_sim')->getClientOriginalName();
        $path1 = $request->file('foto_ktp')->storeAs('images/perpanjangsim/foto_ktp', $fileName1, 'public');
        $path2 = $request->file('pas_foto')->storeAs('images/perpanjangsim/pas_foto', $fileName2, 'public');
        $path3 = $request->file('surat_sehat')->storeAs('images/perpanjangsim/surat_sehat', $fileName3, 'public');
        $path4 = $request->file('foto_sim')->storeAs('images/perpanjangsim/foto_sim', $fileName4, 'public');
        $requestData["foto_ktp"] ='/storage/'.$path1;
        $requestData["pas_foto"] ='/storage/'.$path2;
        $requestData["surat_sehat"] ='/storage/'.$path3;
        $requestData["foto_sim"] ='/storage/'.$path4;
        PanjangSim::create($requestData);
        return redirect('perpanjang-sim')->with('flash-message', 'Berhasil Daftar Perpanjang SIM');
    }
}
