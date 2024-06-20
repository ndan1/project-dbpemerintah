<?php

namespace App\Http\Controllers;

use App\Models\BuatSim;
use Illuminate\Http\Request;
use App\Models\JadwalKedatangan;
use App\Models\PembuatanSim;

class JadwalKedatanganPembuatanController extends Controller
{
    public function showScheduleForm()
    {
        $user = auth()->user();
        $pembuatanSim = BuatSim::where('id_customer', $user->customer_id)->first();
        $jadwalKedatangan = JadwalKedatangan::where('id_customer', $user->customer_id)->first();
        $latestRequest = JadwalKedatangan::where('id_customer', $user->customer_id)->latest()->first();
        if ($latestRequest) {
            if ($latestRequest->status == 'passed') {
                // return view('jadwal_form', compact('user', 'jadwalKedatangan'));
                return view('pembuatansim')->with('profile', $user);
            } elseif ($latestRequest->status == 'failed') {
                // $rejectComment = $latestRequest->comments;
                return view('jadwal_form', compact('user', 'jadwalKedatangan', 'pembuatanSim'));
            }else {
                return view('info_jadwal_kedatangan', compact('user', 'jadwalKedatangan'));
            }
        } else {
            return view('jadwal_form', compact('user', 'pembuatanSim'));
        }
    }

    public function submitSchedule(Request $request)
    {
        $request->validate([
            'schedule_date' => 'required|date',
            'schedule_time' => 'required',
        ]);
        $user = auth()->user();
        $existingSchedule = JadwalKedatangan::where('schedule_date', $request->schedule_date)
            ->where('schedule_time', $request->schedule_time)
            ->first();

        if ($existingSchedule) {
            return back()->withErrors(['Jadwal sudah terisi, silakan pilih waktu lain.']);
        }

        JadwalKedatangan::updateOrCreate([
            'id_customer' => $user->customer_id,
        ], [
            'id_pembuatan' => $request->pembuatan_sim_id,
            'schedule_date' => $request->schedule_date,
            'schedule_time' => $request->schedule_time,
            'status' => 'pending',
        ]);

        // return redirect()->route('home')->with('success', 'Jadwal berhasil disubmit.');
        return view('info_jadwal_kedatangan', compact('user', 'jadwalKedatangan'));
    }

//     public function getScheduledTimes(Request $request)
// {
//     $request->validate([
//         'date' => 'required|date',
//     ]);

//     try {
//         $scheduledTimes = JadwalKedatangan::where('schedule_date', $request->date)
//                                           ->pluck('schedule_time')
//                                           ->toArray();

//         return response()->json(['disabledTimes' => $scheduledTimes]);
//     } catch (\Exception $e) {
//         return response()->json(['error' => 'Failed to fetch scheduled times.'], 500);
//     }
// }




}

