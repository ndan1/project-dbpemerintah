<?php

namespace App\Http\Controllers;

use App\Models\JadwalKedatanganPerpanjangan;
use App\Models\PanjangSim;
use App\Models\PembayaranPerpanjangan;
use Illuminate\Http\Request;

class AdminListJadwalPerpanjangan extends Controller
{
    //
    public function index(){
        $jadwalKedatangan = JadwalKedatanganPerpanjangan::with('user')->paginate(7);
        return view('admin.adminjadwalkedatanganperpanjang', compact('jadwalKedatangan'));
    }

    public function show($id)
    {
        $jadwal = JadwalKedatanganPerpanjangan::with('user')->findOrFail($id);
        return view('admin.admindetailjadwalkedatanganperpanjangan', compact('jadwal'));
    }

    public function approveSchedule($id)
    {
        $schedule = JadwalKedatanganPerpanjangan::find($id);
        $schedule->status = 'approved';
        $schedule->save();

        return back()->with('success', 'Jadwal berhasil di-approve.');
    }

    public function rejectSchedule(Request $request, $id)
    {
        $schedule = JadwalKedatanganPerpanjangan::find($id);
        $schedule->status = 'rejected';
        $schedule->save();

        return back()->with('success', 'Jadwal berhasil di-reject.');
    }

    public function passSchedule($id)
    {
        $schedule = JadwalKedatanganPerpanjangan::find($id);
        $schedule->status = 'passed';
        $schedule->save();

        return back()->with('success', 'Ujian praktek berhasil.');
    }
}
