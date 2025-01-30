@extends('layouts.app')

@section('contents')
<div class="container mt-5">
    <h2 class="mb-4">Aksi Laporan</h2>
    <div class="card">
        <div class="card-header bg-primary text-white">
            Daftar Laporan Masuk
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead class="bg-light">
                    <tr>
                        <th>No</th>
                        <th>Nama Pelapor</th>
                        <th>Kategori</th>
                        <th>Deskripsi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Contoh data laporan -->
                    {{-- @foreach($laporan as $key => $item) --}}
                    <tr>
                        {{-- <td>{{ $key + 1 }}</td>
                        <td>{{ $item->nama_pelapor }}</td>
                        <td>{{ $item->kategori }}</td>
                        <td>{{ $item->deskripsi }}</td> --}}
                        <td>
                            <!-- Tombol Terima -->
                            <button type="button" class="btn btn-success btn-sm" disabled>Terima</button>

                            <!-- Tombol Tolak -->
                            <button type="button" class="btn btn-danger btn-sm" disabled>Tolak</button>
                        </td>
                    </tr>
                    {{-- @endforeach --}}
                </tbody>
            </table>
            <div class="mt-3">
                {{-- {{ $laporan->links() }} --}}
            </div>
        </div>
    </div>
</div>
@endsection
