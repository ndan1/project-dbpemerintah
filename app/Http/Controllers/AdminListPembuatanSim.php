<?php

namespace App\Http\Controllers;

use App\Models\BuatSim;
use App\Models\User;
use Illuminate\Http\Request;

class AdminListPembuatanSim extends Controller
{
    //
    public function index(){
        $list = BuatSim::with('user')->paginate(6);
        // return view ('admin.adminpembuatansim', compact('pembuatansim'));
        return view ('admin.adminpembuatansim')->with('pembuatansim', $list);
    }

    public function show($id)
    {
        // Fetch the specific record by id and include the related user data
        $pembuatanSim = BuatSim::with('user')->findOrFail($id);

        // Return the view with the fetched data
        return view('admin.admindetailpembuatan', compact('pembuatanSim'));
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

}
