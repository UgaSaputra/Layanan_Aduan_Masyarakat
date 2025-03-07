<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laporan;
use Illuminate\Support\Facades\Log;
use Exception;

class LaporanController extends Controller
{
    public function daftar(Request $request)
    {
        $query = Laporan::query();

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $laporan = $query->get();
        return view('PengaduanSuperAdmin.DaftarLaporan', compact('laporan'));
    }

    public function detail($id)
    {
        $laporan = Laporan::findOrFail($id);
        return view('PengaduanSuperAdmin.DetailLaporan', compact('laporan'));
    }

    public function UpdateStatus(Request $request, $id, $status)
    {
        if (!in_array($status, ['diproses', 'diterima', 'ditolak', 'dikerjakan', 'selesai'])) {
            return back()->with('error', 'Status tidak valid.');
        }

        $laporan = Laporan::findOrFail($id);
        $laporan->status = $status;
        $laporan->save();

        return redirect()->route('Laporan.daftar')->with('success', 'Status laporan berhasil diperbarui.');
    }

    public function rekap(Request $request)
{
    $query = Laporan::query();

    if ($request->has('kabupaten') && !empty($request->kabupaten)) {
        $query->where('kabupaten', $request->kabupaten);
    }

    $laporan = $query->paginate(10);

    return view('PengaduanSuperAdmin.RekapLaporan', compact('laporan'));
}


public function store(Request $request)
{
    try {
        $request->validate([
            'jenis_laporan' => 'required|string',
            'provinsi' => 'required|string',
            'kabupaten' => 'required|string',
            'alamat' => 'required|string',
            'keterangan' => 'nullable|string',
            'foto1' => 'nullable|image|mimes:jpeg,png,jpg|max:1048576',
            'foto2' => 'nullable|image|mimes:jpeg,png,jpg|max:1048576',
            'foto3' => 'nullable|image|mimes:jpeg,png,jpg|max:1048576',
        ]);

        $foto1 = $request->hasFile('foto1') ? $request->file('foto1')->store('laporan', 'public') : null;
        $foto2 = $request->hasFile('foto2') ? $request->file('foto2')->store('laporan', 'public') : null;
        $foto3 = $request->hasFile('foto3') ? $request->file('foto3')->store('laporan', 'public') : null;

        $laporan = new Laporan();
        $laporan->jenis_laporan = $request->jenis_laporan;
        $laporan->provinsi = $request->provinsi;
        $laporan->kabupaten = $request->kabupaten;
        $laporan->alamat = $request->alamat;
        $laporan->keterangan = $request->keterangan;
        $laporan->foto1 = $foto1;
        $laporan->foto2 = $foto2;
        $laporan->foto3 = $foto3;
        $laporan->save();

        Log::info('Laporan berhasil disimpan', ['laporan' => $laporan->toArray()]);

        return response()->json([
            'message' => 'Laporan berhasil dikirim!',
            'data' => $laporan
        ], 200);

    } catch (Exception $e) {
        Log::error('Gagal mengirim laporan', [
            'error' => $e->getMessage(),
            'trace' => $e->getTraceAsString()
        ]);

        return response()->json([
            'message' => 'Gagal mengirim laporan',
            'error' => $e->getMessage()
        ], 500);
    }
}


    public function status(Request $request, $status)
    {
        try {
            $validStatuses = ['diterima', 'ditolak'];

            $request->validate([
                'status' => 'required|in:' . implode(',', $validStatuses)
            ]);

            $laporan = Laporan::where('status', $status)->get();

            return response()->json($laporan, 200);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Terjadi kesalahan pada server',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function ListLaporan(Request $request)
    {
        $status = $request->query('status');

        if ($status) {
            $laporan = Laporan::where('status', $status)->get();
        } else {
            $laporan = Laporan::all();
        }

        return response()->json($laporan);
    }



    public function StatusUpdate($id, $status)
    {
        $data = Laporan::find($id);

        if (!$data) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }

        $allowedStatus = ['dikerjakan', 'selesai'];
        if (!in_array($status, $allowedStatus)) {
            return response()->json(['message' => 'Status tidak valid'], 400);
        }

        $data->update(['status' => $status]);

        return response()->json([
            'message' => 'Status berhasil diperbarui',
            'status' => $data->status
        ]);
    }

}



    // public function index(Request $request)
    // {
    //     $wilayah = $request->get('wilayah', 'semarang'); // Ambil wilayah dari input, default 'semarang'

    //     // Ambil data laporan berdasarkan wilayah dengan pagination 10 data per halaman
    //     $laporan = Laporan::where('wilayah', $wilayah)->paginate(10);

    //     return view('laporan.index', compact('laporan'));
    // }
