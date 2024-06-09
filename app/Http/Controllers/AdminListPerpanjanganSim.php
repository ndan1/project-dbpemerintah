<?php

namespace App\Http\Controllers;

use App\Models\PanjangSim;
use App\Models\User;
use Illuminate\Http\Request;

class AdminListPerpanjanganSim extends Controller
{
    //
    public function index(){
        $list = PanjangSim::with('user')->paginate(6);
        // return view ('admin.adminpembuatansim', compact('pembuatansim'));
        return view ('admin.adminperpanjangsim')->with('perpanjangsim', $list);
    }

    public function show($id)
    {
        // Fetch the specific record by id and include the related user data
        $perpanjangSim = PanjangSim::with('user')->findOrFail($id);

        // Return the view with the fetched data
        return view('admin.admindetailperpanjang', compact('perpanjangSim'));
    }

    public function adminIndex()
    {
        $perpanjangsim = PanjangSim::where('status', 'pending')->paginate(7);
        return view('admin.adminperpanjangsim', compact('perpanjangsim'));
    }

    public function adminShow($id)
    {
        $perpanjangSim = PanjangSim::find($id);
        return view('admin.admindetailperpanjang', compact('perpanjangSim'));
    }

    public function approve($id)
    {
        $pembuatanSim = PanjangSim::find($id);
        $pembuatanSim->status = 'approved';
        $pembuatanSim->comments = NULL;
        $pembuatanSim->save();

        return redirect()->route('adminperpanjang')->with('success', 'SIM approved successfully.');
    }

    public function reject(Request $request, $id)
    {
        $request->validate([
            'comments' => 'required|string',
        ]);

        $perpanjangSim = PanjangSim::find($id);
        $perpanjangSim->status = 'rejected';
        $perpanjangSim->comments = $request->input('comments');
        $perpanjangSim->save();

        return redirect()->route('adminperpanjang')->with('success', 'SIM rejected with comments.');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
