<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function show() {
        $jumlahlaporan = Laporan::count();
        $aduanSelesai = Laporan::where('status', 'selesai')->count();
        $aduanDitolak = Laporan::where('status', 'ditolak')->count();
        $aduanDikerjakan = Laporan::where('status', 'dikerjakan')->count();
        $menunggukonfirmasi = Laporan::where('status', 'menunggu konfirmasi')->count();
        $aduanTerbaru = Laporan::orderBy('created_at', 'desc')->limit(5)->get();
        $statistikAduan = Laporan::selectRaw('status, COUNT(*) as total')
        ->groupBy('status')
        ->pluck('total', 'status');

        return view('Dashboard.dashboard', compact('jumlahlaporan', 'aduanSelesai', 'aduanDitolak', 'aduanDikerjakan', 'menunggukonfirmasi', 'aduanTerbaru', 'statistikAduan'));
        echo "<h1>". Auth::user()->name ."</h1>";
    }
}

