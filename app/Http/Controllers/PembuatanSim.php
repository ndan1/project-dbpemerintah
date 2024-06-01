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
        // dd($profile->customer_id);
        $latestRequest = BuatSim::where('id_customer', $profile->customer_id)->latest()->first();
        // dd($latestRequest);

        // Cek status persetujuan permintaan terbaru
        if ($latestRequest) {
            if ($latestRequest->status == 'approved') {
                return view('waitquiz');
            } elseif ($latestRequest->status == 'rejected') {
                $rejectComment = $latestRequest->comments;
                return view('pembuatansim', compact('profile', 'rejectComment'));
            } else {
                // return view('pembuatansim', compact('profile'));
                return view('menunggu_respon_admin');
            }
        } else {
            return view('pembuatansim', compact('profile'));
        }
    }

    public function store(Request $request){
        $request->validate([
            'foto_ktp' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'pas_foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'surat_sehat' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'tipe_sim' => 'required|string|in:A,C'
        ]);

        $profile = auth()->user();

        $requestData['id_customer'] = $request->id_customer;
        $requestData['tipe_sim'] = $request->tipe_sim;
        $requestData['status'] = 'pending';

        $fileName1 = time().$request->file('foto_ktp')->getClientOriginalName();
        $fileName2 = time().$request->file('pas_foto')->getClientOriginalName();
        $fileName3 = time().$request->file('surat_sehat')->getClientOriginalName();

        $path1 = $request->file('foto_ktp')->storeAs('images/pembuatansim/foto_ktp', $fileName1, 'public');
        $path2 = $request->file('pas_foto')->storeAs('images/pembuatansim/pas_foto', $fileName2, 'public');
        $path3 = $request->file('surat_sehat')->storeAs('images/pembuatansim/surat_sehat', $fileName3, 'public');

        $requestData["foto_ktp"] ='/storage/'.$path1;
        $requestData["pas_foto"] ='/storage/'.$path2;
        $requestData["surat_sehat"] ='/storage/'.$path3;

        BuatSim::updateOrCreate(
            ['id_customer' => $request->id_customer],
            $requestData
        );

        return redirect('pembuatan-sim')->with('flash-message', 'Berhasil daftar')->with('status', 'pending');
    }
}
