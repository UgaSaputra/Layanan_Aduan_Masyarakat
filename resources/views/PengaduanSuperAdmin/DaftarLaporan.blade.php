@extends('layouts.app')

@section('contents')
    <div class="container mt-5">
        <h2 class="mb-4">Daftar Laporan</h2>
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

        <div class="mb-3">
            <form method="GET" action="{{ route('Laporan.daftar') }}" class="mb-3">
                <label for="status">Filter Status:</label>
                <select name="status" id="status" class="form-control" onchange="this.form.submit()">
                    <option value="">Semua</option>
                    <option value="diterima" {{ request('status') == 'diterima' ? 'selected' : '' }}>Diterima</option>
                    <option value="ditolak" {{ request('status') == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
                    <option value="dikerjakan" {{ request('status') == 'dikerjakan' ? 'selected' : '' }}>Dikerjakan</option>
                    <option value="selesai" {{ request('status') == 'selesai' ? 'selected' : '' }}>Selesai</option>
                    <option value="menunggu konfirmasi" {{ request('status') == 'menunggu konfirmasi' ? 'selected' : '' }}>
                        Menunggu Konfirmasi</option>

                </select>
            </form>
        </div>

        <!-- Tabel Daftar Laporan -->
        <div class="card">
            <div class="card-header bg-primary text-white">
                Daftar Laporan
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead class="bg-light">
                        <tr>
                            <th>No</th>
                            <th>Jenis Laporan</th>
                            <th>Provinsi</th>
                            <th>Kabupaten</th>
                            <th>Alamat</th>
                            <th>Keterangan</th>
                            <th>Foto 1</th>
                            <th>Foto 2</th>
                            <th>Foto 3</th>
                            <th>Aksi</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($laporan as $index => $item)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $item->jenis_laporan }}</td>
                                <td>{{ $item->provinsi }}</td>
                                <td>{{ $item->kabupaten }}</td>
                                <td>{{ $item->alamat }}</td>
                                <td>{{ $item->keterangan ?? '-' }}</td>
                                <td class="text-center">
                                    @if ($item->foto1)
                                        <img src="{{ asset('storage/' . $item->foto1) }}" width="70">
                                    @else
                                        <span class="text-muted">Tidak ada</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    @if ($item->foto2)
                                        <img src="{{ asset('storage/' . $item->foto2) }}" width="70">
                                    @else
                                        <span class="text-muted">Tidak ada</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    @if ($item->foto3)
                                        <img src="{{ asset('storage/' . $item->foto3) }}" width="70">
                                    @else
                                        <span class="text-muted">Tidak ada</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($item->status == 'ditolak' || $item->status == 'dikerjakan')
                                        <button class="btn btn-secondary btn-sm" disabled>Detail</button>
                                    @else
                                        <a href="{{ route('aduanSuperAdmin.detail', $item->id) }}"
                                            class="btn btn-info btn-sm">Detail</a>
                                    @endif
                                </td>
                                <td>
                                    @php
                                        $status = trim(strtolower($item->status));
                                        $bgColor = match ($status) {
                                            'diterima' => '#d4edda',
                                            'ditolak' => '#f8d7da',
                                            'dikerjakan' => '#fff3cd',
                                            'selesai' => '#cce5ff',
                                            'menunggu konfirmasi' => '#e2e3e5',
                                            default => '#f8f9fa',
                                        };
                                        $textColor = match ($status) {
                                            'diterima' => '#155724',
                                            'ditolak' => '#721c24',
                                            'dikerjakan' => '#856404',
                                            'selesai' => '#004085',
                                            'menunggu konfirmasi' => '#383d41',
                                            default => '#6c757d',
                                        };
                                    @endphp
                                    <span style="background-color: {{ $bgColor }}; color: {{ $textColor }}; padding: 5px 10px; border-radius: 4px; display: inline-block;">
                                        {{ ucfirst($status) }}
                                    </span>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
