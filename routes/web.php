<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenajemenPetugasController;
use App\Http\Controllers\MenajemenAdminController;
use App\Http\Controllers\PengaduanAdminController;
use App\Http\Controllers\PengaduanSuperAdminController;
use App\Http\Controllers\About\RegisterController;
use App\Http\Controllers\About\LoginController;
use App\Http\Controllers\ExportController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('layouts.app');
});

Route::get('/petugas/input', [MenajemenPetugasController::class, 'create'])->name('petugas.create');
Route::get('/petugas/lihat', [MenajemenPetugasController::class, 'lihat'])->name('petugas.lihat');
Route::post('/petugas/input', [MenajemenPetugasController::class, 'input'])->name('petugas.input');
Route::get('/petugas/hapus/{id}', [MenajemenPetugasController::class, 'delete'])->name('petugas.delete');



Route::get('/admin/input', [MenajemenAdminController::class, 'show'])->name('admin.show');
Route::get('/admin/show', [MenajemenAdminController::class, 'data'])->name('admin.data');
Route::post('/admin/tambah', [MenajemenAdminController::class, 'tambah'])->name('admin.tambah');
Route::get('/admin/delete/{id}', [MenajemenAdminController::class, 'delete'])->name('admin.delete');


Route::get('/aduan/show', [PengaduanAdminController::class, 'show'])->name('aduanAdmin.show');
Route::get('/aduan/admin', [PengaduanAdminController::class, 'detail'])->name('aduanAdmin.detail');
Route::get('/aduan/aksi', [PengaduanAdminController::class, 'aksi'])->name('aduanAdmin.aksi');
// Route::post('/aksi/input', [PengaduanAdminController::class, 'input'])->name('aksi.input');


Route::get('/aduansuperadmin/show', [PengaduanSuperAdminController::class, 'show'])->name('aduanSuperAdmin.show');
Route::get('/aduansuperadmin/detail', [PengaduanSuperAdminController::class, 'detail'])->name('aduanSuperAdmin.detail');
Route::get('/aduansuperadmin/rekap', [PengaduanSuperAdminController::class, 'rekap'])->name('aduanSuperAdmin.rekap');


Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login.form');


Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register.form');


Route::post('/admin/export-pdf', [ExportController::class, 'exportPdf'])->name('export.pdf');


