<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    //
    public function __construct() {
        $this->middleware('auth');
    }

    public function show($customer_email) {
        // $profile = User::find($customer_email);
        $profile = auth()->user();
        return view('profile', ['profile' => $profile, 'customer_email' => $customer_email]);
    }

    public function store(Request $request) {
        $profile = auth()->user();
        $request->validate([
            'customer_name' => 'required|string|max:250',
            'customer_email' => 'required|string|max:250|email', // Ensure email format
            'tgl_lahir' => 'nullable|date',
            'nik' => 'nullable|string|min:16|max:16', // Ensure NIK has exactly 16 characters
            'gender' => 'nullable|string'
        ]);

        $data = [
            'customer_name' => $request->input('customer_name'),
            'customer_email' => $request->input('customer_email'),
            'tgl_lahir' => $request->input('tgl_lahir'),
            'nik' => $request->input('nik'),
            'gender' => $request->input('gender')
        ];

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->input('password'));
        }
        // $data['customer_name'] = $request->input('customer_name');
        // $data_add['customer_name'] = $request->customer_name;
        // $data_add['tgl_lahir'] = $request->tgl_lahir;
        // $data_add['nik'] = $request->nik;
        // $data_add['gender'] = $request->gender;

        $profile->update($data);
        // $user = User::create($data_add);

        return redirect(route('profile', ['customer_email' => $profile->customer_email]))
        ->with("success", "Profile updated successfully!");


        // $profile = User::findOrFail($customer_email);
        // $profile->customer_name = $request->name;
        // $profile->tgl_lahir = $request->tgl_lahir;
        // $profile->nik = $request->nik;
        // $profile->gender = $request->gender;
        // $profile->save();
        // return redirect()->route('profile')->with('success', 'Profil telah diperbarui');
    }
}
