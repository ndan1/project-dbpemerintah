<?php

namespace App\Http\Controllers;

use App\Models\PembayaranPerpanjangan;
use Illuminate\Http\Request;

class AdminListPembayaranPerpanjangan extends Controller
{
    //
    public function index(){
        $pembayaran = PembayaranPerpanjangan::where('status', 'pending')->paginate(7);
        return view ('admin.adminpembayaranperpanjangan')->with('pembayaran', $pembayaran);
    }

    public function show($id)
    {
        $pembayaran = PembayaranPerpanjangan::find($id);
        return view('admin.admindetailpembayaranperpanjangan', compact('pembayaran'));
    }

    public function approvePayment($id)
    {
        $payment = PembayaranPerpanjangan::find($id);
        $payment->status = 'approved';
        $payment->save();

        return redirect()->route('admin.pembayaranperpanjangan.index')->with('success', 'Bukti pembayaran berhasil di-approve.');
    }

    public function rejectPayment(Request $request, $id)
    {
        $payment = PembayaranPerpanjangan::find($id);
        $payment->status = 'rejected';
        $payment->comments = $request->comments;
        $payment->save();

        return redirect()->route('admin.pembayaranperpanjangan.index')->with('success', 'Bukti pembayaran berhasil di-reject.');
    }
}
