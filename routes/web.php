<?php

use App\Http\Controllers\AdminListJadwalPembuatan;
use App\Http\Controllers\AdminListJadwalPerpanjangan;
use App\Http\Controllers\AdminListPembuatanSim;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginRegisterController;
use App\Http\Controllers\PembuatanSim;
use App\Http\Controllers\PerpanjangSim;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuizClientController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\AdminListPembayaranPembuatan;
use App\Http\Controllers\AdminListPembayaranPerpanjangan;
use App\Http\Controllers\AdminListPerpanjanganSim;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\JadwalKedatanganPembuatanController;
use App\Http\Controllers\JadwalKedatanganPerpanjanganController;
use App\Http\Controllers\PembayaranPembuatanController;
use App\Http\Controllers\PembayaranPerpanjangController;

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

Route::get('/tentang', function () {
    return view('tentang');
})->name('tentang');

Route::get('/profile/{customer_email}', [ProfileController::class, 'show'])->name('profile');
Route::post('/profile/{customer_email}', [ProfileController::class, 'store'])->name('profile.update');

Route::post('/registering',[LoginRegisterController::class, 'store'])->name('registering');
Route::post('/logging-in',[LoginRegisterController::class, 'actionlogin'])->name('actionLogin');

Route::get('/pembuatan-sim',[PembuatanSim::class, 'show'])->name('pembuatan-sim');
Route::post('/pembuatan-sim',[PembuatanSim::class, 'store'])->name('buat-sim');

Route::get('/perpanjang-sim',[PerpanjangSim::class, 'show'])->name('perpanjang-sim');
Route::post('/perpanjang-sim',[PerpanjangSim::class, 'store'])->name('panjang-sim');

Route::get('/logout', [LoginRegisterController::class, 'logout'])->name('logout');


Route::get('/adminpanel',[AdminDashboardController::class, 'hitungPembuatanSIM'])->name('adminhome');
// Route::get('/adminpanel', function () {
//     return view('admin/adminhome');
// })->name('adminhome');

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

Route::prefix('admin')->group(function () {
    Route::get('tambah-quiz', function () {
        return view('admin.createQuiz');
    })->name('createQuiz');
    Route::post('tambah-quiz', [QuizController::class, 'BuatQuiz'])->name('buat.quiz');
    Route::get('pertanyaan', [QuizController::class, 'ShowQuiz'])->name('show.quiz');
    Route::get('edit-pertanyaan/{id}', [QuizController::class, 'EditQuizForm'])->name('edit.quiz');
    Route::post('edit-pertanyaan/{id}', [QuizController::class, 'EditQuiz'])->name('edit.quiz');
    Route::get('hapus-pertanyaan/{id}', [QuizController::class, 'DeleteQuiz'])->name('delete.quiz');

    Route::get('pembuatan-sim', [AdminListPembuatanSim::class, 'adminIndex'])->name('adminpembuatan');
    Route::get('pembuatan-sim/{id}', [AdminListPembuatanSim::class, 'adminShow'])->name('admin.pembuatan-sim.show');
    Route::post('pembuatan-sim/{id}/approve', [AdminListPembuatanSim::class, 'approve'])->name('admin.pembuatan-sim.approve');
    Route::post('pembuatan-sim/{id}/reject', [AdminListPembuatanSim::class, 'reject'])->name('admin.pembuatan-sim.reject');

    Route::get('perpanjang-sim', [AdminListPerpanjanganSim::class, 'adminIndex'])->name('adminperpanjang');
    Route::get('perpanjang-sim/{id}', [AdminListPerpanjanganSim::class, 'adminShow'])->name('admin.perpanjang-sim.show');
    Route::post('perpanjang-sim/{id}/approve', [AdminListPerpanjanganSim::class, 'approve'])->name('admin.perpanjang-sim.approve');
    Route::post('perpanjang-sim/{id}/reject', [AdminListPerpanjanganSim::class, 'reject'])->name('admin.perpanjang-sim.reject');

    Route::get('/pembayaran-pembuatan', [AdminListPembayaranPembuatan::class, 'index'])->name('admin.pembayaran.index');
    Route::get('/pembayaran-pembuatan/{id}', [AdminListPembayaranPembuatan::class, 'show'])->name('admin.pembayaran.show');
    Route::post('/pembayaran-pembuatan/{id}/approve', [AdminListPembayaranPembuatan::class, 'approvePayment'])->name('admin.pembayaran.approve');
    Route::post('/pembayaran-pembuatan/{id}/reject', [AdminListPembayaranPembuatan::class, 'rejectPayment'])->name('admin.pembayaran.reject');

    Route::get('/jadwal-kedatangan-pembuatan', [AdminListJadwalPembuatan::class, 'index'])->name('admin.jadwal-kedatangan.index');
    Route::get('/jadwal-kedatangan-pembuatan/{id}', [AdminListJadwalPembuatan::class, 'show'])->name('admin.jadwal-kedatangan.show');
    Route::post('/jadwal-kedatangan-pembuatan-approve/{id}', [AdminListJadwalPembuatan::class, 'approveSchedule'])->name('jadwal-kedatangan.approve');
    Route::post('/jadwal-kedatangan-pembuatan-reject/{id}', [AdminListJadwalPembuatan::class, 'rejectSchedule'])->name('jadwal-kedatangan.reject');
    Route::post('/jadwal-kedatangan-pembuatan-fail/{id}', [AdminListJadwalPembuatan::class, 'failSchedule'])->name('jadwal-kedatangan.fail');
    Route::post('/jadwal-kedatangan-pembuatan-pass/{id}', [AdminListJadwalPembuatan::class, 'passSchedule'])->name('jadwal-kedatangan.pass');
    Route::patch('/admin/jadwal/{id}/updateStatus', [AdminListJadwalPembuatan::class, 'updateStatus'])->name('admin.jadwal.updateStatus');

    Route::get('/pembayaran-perpanjangan', [AdminListPembayaranPerpanjangan::class, 'index'])->name('admin.pembayaranperpanjangan.index');
    Route::get('/pembayaran-perpanjangan/{id}', [AdminListPembayaranPerpanjangan::class, 'show'])->name('admin.pembayaranperpanjangan.show');
    Route::post('/pembayaran-perpanjangan/{id}/approve', [AdminListPembayaranPerpanjangan::class, 'approvePayment'])->name('admin.pembayaranperpanjangan.approve');
    Route::post('/pembayaran-perpanjangan/{id}/reject', [AdminListPembayaranPerpanjangan::class, 'rejectPayment'])->name('admin.pembayaranperpanjangan.reject');

    Route::get('/jadwal-kedatangan-perpanjangan', [AdminListJadwalPerpanjangan::class, 'index'])->name('admin.jadwal-kedatangan-perpanjangan.index');
    Route::get('/jadwal-kedatangan-perpanjangan/{id}', [AdminListJadwalPerpanjangan::class, 'show'])->name('admin.jadwal-kedatangan-perpanjangan.show');
    Route::post('/jadwal-kedatangan-perpanjangan-approve/{id}', [AdminListJadwalPerpanjangan::class, 'approveSchedule'])->name('jadwal-kedatangan-perpanjangan.approve');
    Route::post('/jadwal-kedatangan-perpanjangan-reject/{id}', [AdminListJadwalPerpanjangan::class, 'rejectSchedule'])->name('jadwal-kedatangan-perpanjangan.reject');
    Route::post('/jadwal-kedatangan-perpanjangan-fail/{id}', [AdminListJadwalPerpanjangan::class, 'failSchedule'])->name('jadwal-kedatangan-perpanjangan.fail');
    Route::post('/jadwal-kedatangan-perpanjangan-pass/{id}', [AdminListJadwalPerpanjangan::class, 'passSchedule'])->name('jadwal-kedatangan-perpanjangan.pass');
    Route::get('berita', [BeritaController::class, 'ShowBeritaAdmin'])->name('show.berita');
    Route::post('tambah-berita', [BeritaController::class, 'BuatBerita'])->name('buat.berita');
    Route::get('tambah-berita', function () {
        return view('admin.tambahberita');
        })->name('createBerita');

        Route::get('edit-berita/{id}', [BeritaController::class, 'EditBeritaForm'])->name('edit.berita');
        Route::post('edit-berita/{id}', [BeritaController::class, 'EditBerita'])->name('edit.berita');
        Route::get('hapus-berita/{id}', [BeritaController::class, 'DeleteBerita'])->name('delete.berita');
});

// Route::get('/ujian-teori', function () {
    //     return view('quiz');
    // })->name('quiz');
Route::get('pembuatan-sim/ujian-teori', [QuizClientController::class, 'ShowQuizClient'])->name('show.quiz.client');
Route::post('pembuatan-sim/ujian-teori', [QuizClientController::class, 'SubmitQuiz'])->name('submit.quiz');
Route::get('pembuatan-sim/hasil-ujian-teori', [QuizClientController::class, 'calculateScore'])->name('result.show');
Route::post('pembuatan-sim/hasil-ujian-teori', [QuizClientController::class, 'calculateScore'])->name('result.show');
// Route::get('pembuatan-sim/hasil-ujian-teori', [QuizClientController::class, 'calculateScore']); // Optional, jika diperlukan akses langsung


Route::get('pembuatan-sim/pembayaran', [PembayaranPembuatanController::class, 'showPaymentForm'])->name('pembayaran.form');
Route::post('pembuatan-sim/pembayaran-submit', [PembayaranPembuatanController::class, 'submitPayment'])->name('pembayaran.submit');

Route::get('pembuatan-sim/jadwal-kedatangan', [JadwalKedatanganPembuatanController::class, 'showScheduleForm'])->name('jadwal-kedatangan.form');
Route::post('pembuatan-sim/jadwal-kedatangan-submit', [JadwalKedatanganPembuatanController::class, 'submitSchedule'])->name('jadwal-kedatangan.submit');

Route::get('perpanjang-sim/pembayaran', [PembayaranPerpanjangController::class, 'showPaymentForm'])->name('pembayaran-perpanjang.form');
Route::post('perpanjang-sim/pembayaran-submit', [PembayaranPerpanjangController::class, 'submitPayment'])->name('pembayaran-perpanjang.submit');

Route::get('perpanjang-sim/jadwal-kedatangan', [JadwalKedatanganPerpanjanganController::class, 'showScheduleForm'])->name('jadwal-kedatangan-perpanjang.form');
Route::post('perpanjang-sim/jadwal-kedatangan-submit', [JadwalKedatanganPerpanjanganController::class, 'submitSchedule'])->name('jadwal-kedatangan-perpanjang.submit');

Route::get('berita', [BeritaController::class, 'ShowBeritaMasyarakat'])->name('show.berita.masyarakat');
Route::get('berita/{id}', [BeritaController::class, 'ShowBeritaDetail'])->name('show.berita.detail');
