<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LaporanController;
// use Laravel\Sanctum\Http\Controllers\CsrfCookieController;

/*
|--------------------------------------------------------------------------u
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);


Route::middleware('auth:sanctum')->get('/dashboard', function (Request $request) {
    return response()->json($request->user());
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return response()->json($request->user());
});

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/laporan', [LaporanController::class, 'store']);
    Route::get('/list/laporan', [LaporanController::class, 'ListLaporan']);
    Route::put('/laporan/{id}/{status}', [LaporanController::class, 'updateStatus'])->name('laporan.updateStatus');
    Route::put('/status/update-status/{id}/{status}', [LaporanController::class, 'StatusUpdate'])->name('statusUpdate');
    // Route::get('/status/update-data/{id}/{status}', [LaporanController::class, 'DataUpdate'])->name('DataUpdate');
});
