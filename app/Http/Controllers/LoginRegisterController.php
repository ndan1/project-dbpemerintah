<?php


namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
// use App\Http\Controllers\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Session;

class LoginRegisterController extends Controller {
    public function store(Request $request) {
        $request->validate([
            'customer_name' => 'required|string|max:250',
            'customer_email' => 'required|email|max:250|unique:users',
            'customer_password' => 'required|min:8|confirmed'
        ]);

        $data['customer_name'] = $request->customer_name;
        $data['customer_email'] = $request->customer_email;
        $data['password'] = Hash::make($request->customer_password);
        $user = User::create($data);
        if (!$user) {
            return redirect()->back()->withErrors(['message'=>'User not found'])->withInput();
        }
        return redirect('/login')->with('success', 'Pendaftaran berhasil! Silakan masuk.');
    }

    public function actionlogin(Request $request)
    {
        $request->validate([
            'customer_email' => 'required',
            'password' => 'required'
        ]);

        $credentials = $request->only('customer_email', 'password');

        // Periksa apakah pengguna ada dalam basis data
        $user = User::where('customer_email', $request->customer_email)->first();

        if(!$user) {
            return redirect(route('login'))->with("error", "User not found!");
        }

        // Jika pengguna ada dalam basis data, coba untuk melakukan autentikasi
        if(Auth::attempt($credentials)){
            return redirect()->intended(route('home'));
        }

        // Jika autentikasi gagal, berarti password salah
        return redirect(route('login'))->with("error", "Wrong password!");

    }

    function logout(){
        Session::flush();
        Auth::Logout();
        return redirect(route('home'));
    }
}
