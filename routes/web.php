<?php

use App\Http\Controllers\AdminListPembuatanSim;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginRegisterController;
use App\Http\Controllers\PembuatanSim;
use App\Http\Controllers\PerpanjangSim;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/home', function () {
    return view('home');
})->name('home');

Route::get('/register', function () {
    return view('register');
})->name('register');

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/profile/{customer_email}', [ProfileController::class, 'show'])->name('profile');
Route::post('/profile/{customer_email}', [ProfileController::class, 'store'])->name('profile.update');

Route::post('/registering',[LoginRegisterController::class, 'store'])->name('registering');
Route::post('/logging-in',[LoginRegisterController::class, 'actionlogin'])->name('actionLogin');

Route::get('/pembuatan-sim',[PembuatanSim::class, 'show'])->name('pembuatan-sim');
Route::post('/pembuatan-sim',[PembuatanSim::class, 'store'])->name('buat-sim');

Route::get('/perpanjang-sim',[PerpanjangSim::class, 'show'])->name('perpanjang-sim');
Route::post('/perpanjang-sim',[PerpanjangSim::class, 'store'])->name('panjang-sim');

Route::get('/logout', [LoginRegisterController::class, 'logout'])->name('logout');


Route::get('/adminpanel', function () {
    return view('admin/adminhome');
})->name('adminhome');
// Route::get('/adminpanel', function () {
//     return view('admin/adminhome');
// })->middleware('pegawai')->name('adminhome');

Route::get('/adminregister', function () {
    return view('admin/adminregister');
})->name('adminregister');

Route::get('/quiz', function () {
    return view('quiz');
})->name('quiz');

Route::post('/registeringadmin',[LoginRegisterController::class, 'storeadmin'])->name('registering.admin');

Route::get('/adminlogin', function () {
    return view('admin/adminlogin');
})->name('adminlogin');

Route::post('/loginadmin',[LoginRegisterController::class, 'loginadmin'])->name('login.admin');
Route::get('/logoutadmin', [LoginRegisterController::class, 'logoutadmin'])->name('logoutadmin');

// Route::get('/adminpembuatan', function () {
//     return view('admin/adminpembuatansim');
// })->name('adminpembuatan');

// Route::resource("/adminpembuatan", AdminListPembuatanSim::class);
// Route::get('/adminpembuatan',[AdminListPembuatanSim::class, 'index'])->name('list-pembuatan-sim');
// Route::get('/pembuatan-sim/{id}', [AdminListPembuatanSim::class, 'show'])->name('pembuatan-sim.show');
    Route::get('/admin/pembuatan-sim', [AdminListPembuatanSim::class, 'adminIndex'])->name('adminpembuatan');
    Route::get('/admin/pembuatan-sim/{id}', [AdminListPembuatanSim::class, 'adminShow'])->name('admin.pembuatan-sim.show');
    Route::post('/admin/pembuatan-sim/{id}/approve', [AdminListPembuatanSim::class, 'approve'])->name('admin.pembuatan-sim.approve');
    Route::post('/admin/pembuatan-sim/{id}/reject', [AdminListPembuatanSim::class, 'reject'])->name('admin.pembuatan-sim.reject');
