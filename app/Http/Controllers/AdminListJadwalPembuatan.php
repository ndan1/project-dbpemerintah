<?php

namespace App\Http\Controllers;

use App\Models\BuatSim;
use App\Models\JadwalKedatangan;
use App\Models\Pembayaran;
use Illuminate\Http\Request;

class AdminListJadwalPembuatan extends Controller
{
    //
    public function index(){
        $jadwalKedatangan = JadwalKedatangan::with('user')->paginate(7);
        return view('admin.adminjadwalkedatangan', compact('jadwalKedatangan'));
    }

    public function show($id)
    {
        $jadwal = JadwalKedatangan::with('user')->findOrFail($id);
        return view('admin.admindetailjadwalkedatangan', compact('jadwal'));
    }

    public function approveSchedule($id)
    {
        $schedule = JadwalKedatangan::find($id);
        $schedule->status = 'approved';
        $schedule->save();

        return back()->with('success', 'Jadwal berhasil di-approve.');
    }

    public function rejectSchedule(Request $request, $id)
    {
        $schedule = JadwalKedatangan::find($id);
        $schedule->status = 'rejected';
        $schedule->save();

        return back()->with('success', 'Jadwal berhasil di-reject.');
    }

    public function updateStatus(Request $request, $id)
    {
        $jadwal = JadwalKedatangan::findOrFail($id);

        if ($request->status == 'failed') {
            $jadwal->attempt_count += 1;

            if ($jadwal->attempt_count >= 3) {
                $pembayaran = Pembayaran::where('id_customer', $jadwal->id_customer)->latest()->first();
                if ($pembayaran) {
                    $pembayaran->status = 'pending';
                    $pembayaran->save();
                }
                $jadwal->status = 'failed';
            } else {
                $jadwal->status = 'menunggu jadwal ulang';
            }
        } else {
            $jadwal->status = 'passed';
            $buatSim = BuatSim::where('id_customer', $jadwal->id_customer)->first();
            if ($buatSim) {
                $buatSim->status = 'selesai';
                $buatSim->save();
            }
        }

        $jadwal->save();

        return back()->with('success', 'Status kedatangan berhasil diperbarui.');
    }

    public function failSchedule($id)
    {
        $schedule = JadwalKedatangan::find($id);
        $schedule->attempt_count += 1;
        $schedule->status = 'failed';
        $schedule->save();

        if ($schedule->attempt_count >= 3) {
            // Jika sudah gagal 3 kali, reset status dan attempt_count agar bisa memilih jadwal baru
            $pembayaran = Pembayaran::where('id_customer', $schedule->id_customer)->latest()->first();
            if ($pembayaran) {
                $pembayaran->status = 'repay';
                $pembayaran->save();
            }
            $schedule->attempt_count = 0;
            $schedule->save();
        }

        return back()->with('success', 'Ujian praktek gagal.');
    }

    public function passSchedule($id)
    {
        $schedule = JadwalKedatangan::find($id);
        $schedule->status = 'passed';
        $schedule->save();

        return back()->with('success', 'Ujian praktek berhasil.');
    }
}
