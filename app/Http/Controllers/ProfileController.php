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

        // Validasi data input
        $validatedData = $request->validate([
            'customer_name' => 'required|string|max:250',
            'customer_email' => 'required|string|max:250|email',
            'tgl_lahir' => 'required|date',
            'nik' => 'required|string|min:16|max:16',
            'gender' => 'required|string',
            'tempat_lahir' => 'required|string|max:100',
            'goldar' => 'required|string|max:2',
            'provinsi' => 'required|string|max:100',
            'alamat' => 'required|string|max:250',
            'pekerjaan' => 'required|string|max:100'
        ]);

        // Siapkan data untuk diupdate
        $data = [
            'customer_name' => $validatedData['customer_name'],
            'customer_email' => $validatedData['customer_email'],
            'tgl_lahir' => $validatedData['tgl_lahir'],
            'nik' => $validatedData['nik'],
            'gender' => $validatedData['gender'],
            'tempat_lahir' => $validatedData['tempat_lahir'],
            'goldar' => $validatedData['goldar'],
            'provinsi' => $validatedData['provinsi'],
            'alamat' => $validatedData['alamat'],
            'pekerjaan' => $validatedData['pekerjaan']
        ];

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->input('password'));
        }

        // Update profil pengguna
        $updateStatus = $profile->update($data);

        // Periksa apakah update berhasil
        if($updateStatus) {
            return redirect()->route('profile', ['customer_email' => $profile->customer_email])
                ->with('success', 'Profile updated successfully!');
        } else {
            return redirect()->route('profile', ['customer_email' => $profile->customer_email])
                ->with('error', 'Failed to update profile.');
        }
    }

}

