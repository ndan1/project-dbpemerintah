<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use Illuminate\Http\Request;

class AdminListPembayaranPembuatan extends Controller
{
    public function index(){
        $pembayaran = Pembayaran::where('status', 'pending')->paginate(7);
        return view ('admin.adminpembayaran')->with('pembayaran', $pembayaran);
    }

    public function show($id)
    {
        $pembayaran = Pembayaran::find($id);
        return view('admin.admindetailpembayaran', compact('pembayaran'));
    }

    public function approvePayment($id)
    {
        $payment = Pembayaran::find($id);
        $payment->status = 'approved';
        $payment->save();

        return redirect()->route('admin.pembayaran.index')->with('success', 'Bukti pembayaran berhasil di-approve.');
    }

    public function rejectPayment(Request $request, $id)
    {
        $payment = Pembayaran::find($id);
        $payment->status = 'rejected';
        $payment->comments = $request->comments;
        $payment->save();

        return redirect()->route('admin.pembayaran.index')->with('success', 'Bukti pembayaran berhasil di-reject.');
    }
}
