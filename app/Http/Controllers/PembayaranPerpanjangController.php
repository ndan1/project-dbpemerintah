<?php

namespace App\Http\Controllers;

use App\Models\PanjangSim;
use App\Models\PembayaranPerpanjangan;
use Illuminate\Http\Request;

class PembayaranPerpanjangController extends Controller
{
    //
    public function showPaymentForm()
    {
        $user = auth()->user();
        $perpanjangSim = PanjangSim::where('id_customer', $user->customer_id)->first();

        if (!$perpanjangSim) {
            // Redirect back or show error if no pembuatanSim found
            return redirect()->route('home')->with('error', 'No pembuatan SIM found for this user.');
        }

        $amount = $perpanjangSim->tipe_sim == 'A' ? 90000 : 75000;

        // Gunakan model Pembayaran untuk mengambil permintaan terbaru
        $latestRequest = PembayaranPerpanjangan::where('id_customer', $user->customer_id)->latest()->first();

        // Cek status persetujuan permintaan terbaru
        if ($latestRequest) {
            if ($latestRequest->status == 'approved') {
                return redirect()->route('jadwal-kedatangan-perpanjang.form', compact('user', 'perpanjangSim'));
            } elseif ($latestRequest->status == 'rejected') {
                $rejectComment = $latestRequest->comments;
                return view('pembayaran_form_perpanjangan', compact('user', 'rejectComment', 'amount', 'perpanjangSim'));
            }elseif ($latestRequest->status == 'repay') {
                return view('pembayaran_form_perpanjangan', compact('amount', 'perpanjangSim'));
            } else {
                return view('menunggu_respon_admin');
            }
        } else {
            return view('pembayaran_form_perpanjangan', compact('amount', 'perpanjangSim'));
        }
    }

    public function submitPayment(Request $request)
    {
        $request->validate([
            'payment_proof' => 'required|file|mimes:jpg,png,pdf|max:2048',
        ]);

        $user = auth()->user();
        $paymentProofPath = $request->file('payment_proof')->store('payment_proofs', 'public');

        PembayaranPerpanjangan::updateOrCreate([
            'id_customer' => $user->customer_id,
        ], [
            'id_perpanjang' => $request->perpanjang_sim_id,
            'amount' => $request->amount,
            'payment_proof' => $paymentProofPath,
            'status' => 'pending',
        ]);

        return redirect()->route('home')->with('success', 'Bukti pembayaran berhasil diunggah.');
    }
}
