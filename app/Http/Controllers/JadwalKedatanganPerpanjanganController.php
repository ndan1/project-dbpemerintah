<?php

namespace App\Http\Controllers;

use App\Models\JadwalKedatangan;
use App\Models\JadwalKedatanganPerpanjangan;
use App\Models\PanjangSim;
use Illuminate\Http\Request;

class JadwalKedatanganPerpanjanganController extends Controller
{
    //
    public function showScheduleForm()
    {
        $user = auth()->user();
        $perpanjangSim = PanjangSim::where('id_customer', $user->customer_id)->first();
        $jadwalKedatangan = JadwalKedatanganPerpanjangan::where('id_customer', $user->customer_id)->first();
        $latestRequest = JadwalKedatanganPerpanjangan::where('id_customer', $user->customer_id)->latest()->first();
        if ($latestRequest) {
            if ($latestRequest->status == 'passed') {
                // return view('jadwal_form', compact('user', 'jadwalKedatangan'));
                return view('perpanjangsim')->with('profile', $user);
            } elseif ($latestRequest->status == 'failed') {
                // $rejectComment = $latestRequest->comments;
                return view('jadwal_form_perpanjangan', compact('user', 'jadwalKedatangan', 'perpanjangSim'));
            }else {
                return view('info_jadwal_kedatangan', compact('user', 'jadwalKedatangan'));
            }
        } else {
            return view('jadwal_form_perpanjangan', compact('user', 'perpanjangSim'));
        }
    }

    public function submitSchedule(Request $request)
    {
        $request->validate([
            'schedule_date' => 'required|date',
            'schedule_time' => 'required',
        ]);
        $user = auth()->user();
        $existingSchedule = JadwalKedatanganPerpanjangan::where('schedule_date', $request->schedule_date)
            ->where('schedule_time', $request->schedule_time)
            ->first();

        if ($existingSchedule) {
            return back()->withErrors(['Jadwal sudah terisi, silakan pilih waktu lain.']);
        }

        JadwalKedatanganPerpanjangan::updateOrCreate([
            'id_customer' => $user->customer_id,
        ], [
            'id_perpanjang' => $request->perpanjang_sim_id,
            'schedule_date' => $request->schedule_date,
            'schedule_time' => $request->schedule_time,
            'status' => 'pending',
        ]);

        return redirect()->route('home')->with('success', 'Jadwal berhasil disubmit.');
    }
}
