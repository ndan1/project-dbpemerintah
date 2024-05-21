<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginRegisterController;
use App\Http\Controllers\PembuatanSim;
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

Route::get('/perpanjang-sim',[PembuatanSim::class, 'show'])->name('perpanjang-sim');
Route::post('/perpanjang-sim',[PembuatanSim::class, 'store'])->name('panjang-sim');
