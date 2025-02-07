<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MenajemenAdminController;
use App\Http\Controllers\PengaduanAdminController;
use App\Http\Controllers\MenajemenPetugasController;
use App\Http\Controllers\PengaduanSuperAdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Here is where you can register web routes for your application.
*/

Route::middleware(['guest'])->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login.form');
    Route::post('/login', [LoginController::class, 'login'])->name('login');
});

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login'); // Ganti dengan rute login kamu
})->name('logout');

Route::get('/home', function () {
    return redirect('/dashboard');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'show'])->name('dashboard.show');
});

// Rute untuk Petugas
Route::middleware(['auth', 'role:superadmin'])->group(function () {
    Route::get('/petugas/input', [MenajemenPetugasController::class, 'create'])->name('petugas.create');
    Route::get('/petugas/lihat', [MenajemenPetugasController::class, 'lihat'])->name('petugas.lihat');
    Route::post('/petugas/input', [MenajemenPetugasController::class, 'input'])->name('petugas.input');
    Route::get('/petugas/hapus/{id}', [MenajemenPetugasController::class, 'delete'])->name('petugas.delete');
});

// Rute untuk Admin
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/input', [MenajemenAdminController::class, 'show'])->name('admin.show');
    Route::get('/admin/show', [MenajemenAdminController::class, 'data'])->name('admin.data');
    Route::post('/admin/tambah', [MenajemenAdminController::class, 'tambah'])->name('admin.tambah');
    Route::get('/admin/delete/{id}', [MenajemenAdminController::class, 'delete'])->name('admin.delete');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/aduan/show', [PengaduanAdminController::class, 'show'])->name('aduanAdmin.show');
    Route::get('/aduan/admin', [PengaduanAdminController::class, 'detail'])->name('aduanAdmin.detail');
    Route::get('/aduan/aksi', [PengaduanAdminController::class, 'aksi'])->name('aduanAdmin.aksi');
});

// Rute untuk SuperAdmin
Route::middleware(['auth', 'role:superadmin'])->group(function () {
    Route::get('/aduansuperadmin/show', [PengaduanSuperAdminController::class, 'show'])->name('aduanSuperAdmin.show');
    Route::get('/aduansuperadmin/detail', [PengaduanSuperAdminController::class, 'detail'])->name('aduanSuperAdmin.detail');
    Route::get('/aduansuperadmin/rekap', [PengaduanSuperAdminController::class, 'rekap'])->name('aduanSuperAdmin.rekap');
});

Route::middleware(['auth', 'role:superadmin'])->group(function () {
    Route::post('/admin/export-pdf', [ExportController::class, 'exportPdf'])->name('export.pdf');
});
