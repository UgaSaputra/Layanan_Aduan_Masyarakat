<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MenajemenAdminController;
use App\Http\Controllers\MenajemenPetugasController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Here is where you can register web routes for your application.
*/


// Route::get('/dashboard/user', function () {
//     return view('user.dashboard');
// })->name('user.dashboard');

// Route::get('/dashboard/petugas', function () {
//     return view('petugas.dashboard');
// })->name('petugas.dashboard');


Route::middleware(['guest'])->group(function () {});
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [LoginController::class, 'login'])->name('login');

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout');

Route::get('/home', function () {
    return redirect('/dashboard');
});

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'show'])->name('dashboard.show');
});

Route::middleware(['auth', 'role:superadmin'])->group(function () {
    Route::get('/petugas/input', [MenajemenPetugasController::class, 'create'])->name('petugas.create');
    Route::get('/petugas/lihat', [MenajemenPetugasController::class, 'lihat'])->name('petugas.lihat');
    Route::post('/petugas/input', [MenajemenPetugasController::class, 'input'])->name('petugas.input');
    Route::get('/petugas/hapus/{id}', [MenajemenPetugasController::class, 'delete'])->name('petugas.delete');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/input', [MenajemenAdminController::class, 'show'])->name('admin.show');
    Route::get('/admin/show', [MenajemenAdminController::class, 'data'])->name('admin.data');
    Route::post('/admin/tambah', [MenajemenAdminController::class, 'tambah'])->name('admin.tambah');
    Route::get('/admin/delete/{id}', [MenajemenAdminController::class, 'delete'])->name('admin.delete');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/aduansuperadmin/daftar', [LaporanController::class, 'daftar'])->name('Laporan.daftar');
    Route::get('/aduansuperadmin/detail/{id}', [LaporanController::class, 'detail'])->name('aduanSuperAdmin.detail');
    Route::get('/aduansuperadmin/rekap', [LaporanController::class, 'rekap'])->name('aduanSuperAdmin.rekap');
    Route::put('/laporan/{id}/{status}', [LaporanController::class, 'updateStatus'])->name('laporan.updateStatus');
    // Route::post('/laporan/{id}/update', [LaporanController::class, 'update'])->name('laporan.update');
});
