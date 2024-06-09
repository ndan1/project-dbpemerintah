<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pembayaran;
use App\Models\BuatSim;

class PembayaranPembuatanController extends Controller
{
    public function showPaymentForm()
    {
        $user = auth()->user();
        $pembuatanSim = BuatSim::where('id_customer', $user->customer_id)->first();

        if (!$pembuatanSim) {
            // Redirect back or show error if no pembuatanSim found
            return redirect()->route('home')->with('error', 'No pembuatan SIM found for this user.');
        }

        $amount = $pembuatanSim->tipe_sim == 'A' ? 120000 : 100000;

        // Gunakan model Pembayaran untuk mengambil permintaan terbaru
        $latestRequest = Pembayaran::where('id_customer', $user->customer_id)->latest()->first();

        // Cek status persetujuan permintaan terbaru
        if ($latestRequest) {
            if ($latestRequest->status == 'approved') {
                return redirect()->route('jadwal-kedatangan.form', compact('user', 'pembuatanSim'));
            } elseif ($latestRequest->status == 'rejected') {
                $rejectComment = $latestRequest->comments;
                return view('pembayaran_form', compact('user', 'rejectComment', 'amount', 'pembuatanSim'));
            }elseif ($latestRequest->status == 'repay') {
                return view('pembayaran_form', compact('amount', 'pembuatanSim'));
            } else {
                return view('menunggu_respon_admin');
            }
        } else {
            return view('pembayaran_form', compact('amount', 'pembuatanSim'));
        }
    }

    public function submitPayment(Request $request)
    {
        $request->validate([
            'payment_proof' => 'required|file|mimes:jpg,png,pdf|max:2048',
        ]);

        $user = auth()->user();
        $paymentProofPath = $request->file('payment_proof')->store('payment_proofs', 'public');

        Pembayaran::updateOrCreate([
            'id_customer' => $user->customer_id,
        ], [
            'id_pembuatan' => $request->pembuatan_sim_id,
            'id_perpanjang' => $request->perpanjang_sim_id,
            'amount' => $request->amount,
            'payment_proof' => $paymentProofPath,
            'status' => 'pending',
        ]);

        return redirect()->route('home')->with('success', 'Bukti pembayaran berhasil diunggah.');
    }
}
