@extends('layouts.app')

@section('contents')
    <div class="container mt-5">
        <div class="card shadow">
            <div class="card-header bg-primary text-white text-center">
                <h3>Detail Laporan</h3>
            </div>
            <div class="card-body">
                <h4>Informasi Laporan</h4>
                <table class="table">
                    <tr>
                        <th>Jenis Laporan</th>
                        <td>{{ $laporan->jenis_laporan }}</td>
                    </tr>
                    <tr>
                        <th>Alamat</th>
                        <td>{{ $laporan->alamat }}</td>
                    </tr>
                    <tr>
                        <th>Keterangan</th>
                        <td>{{ $laporan->keterangan ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td>
                            @php
                                $status = trim(strtolower($laporan->status));
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
                            <span
                                style="background-color: {{ $bgColor }}; color: {{ $textColor }}; padding: 5px 10px; border-radius: 4px; display: inline-block;">
                                {{ ucfirst($status) }}
                            </span>
                        </td>

                    </tr>

                </table>

                <h4>Bukti Foto</h4>
                <div class="row text-center">
                    @if ($laporan->foto1)
                        <div class="col-md-4">
                            <button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#modalFoto1">Lihat
                                Bukti 1</button>
                        </div>
                    @endif
                    @if ($laporan->foto2)
                        <div class="col-md-4">
                            <button class="btn btn-outline-primary" data-bs-toggle="modal"
                                data-bs-target="#modalFoto2">Lihat Bukti 2</button>
                        </div>
                    @endif
                    @if ($laporan->foto3)
                        <div class="col-md-4">
                            <button class="btn btn-outline-primary" data-bs-toggle="modal"
                                data-bs-target="#modalFoto3">Lihat Bukti 3</button>
                        </div>
                    @endif
                </div>

                @if ($laporan->status !== 'diterima' && $laporan->status !== 'selesai' && $laporan->status !== 'dikerjakan')
                    <form action="{{ route('laporan.updateStatus', ['id' => $laporan->id, 'status' => 'diterima']) }}"
                        method="POST" style="display:inline;">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="btn btn-success">Terima</button>
                    </form>

                    <button type="button" class="btn btn-danger" onclick="openModal({{ $laporan->id }})">Tolak</button>

                    <div id="modal-tolak-{{ $laporan->id }}" class="modal"
                        style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.5); align-items:center; justify-content:center;">
                        <div style="background:white; padding:20px; border-radius:5px; width:400px;">
                            <h4>Alasan Penolakan</h4>
                            <textarea id="alasan-{{ $laporan->id }}" rows="3" style="width:100%;" placeholder="Masukkan alasan penolakan"></textarea>
                            <br><br>
                            <button onclick="submitForm({{ $laporan->id }})" class="btn btn-primary">Kirim</button>
                            <button onclick="closeModal({{ $laporan->id }})" class="btn btn-secondary">Batal</button>
                        </div>
                    </div>

                    <form id="form-tolak-{{ $laporan->id }}"
                        action="{{ route('laporan.updateStatus', ['id' => $laporan->id, 'status' => 'ditolak']) }}"
                        method="POST" style="display:none;">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="alasan" id="input-alasan-{{ $laporan->id }}">
                    </form>

                    <script>
                        function openModal(id) {
                            document.getElementById('modal-tolak-' + id).style.display = 'flex';
                        }

                        function closeModal(id) {
                            document.getElementById('modal-tolak-' + id).style.display = 'none';
                        }

                        function submitForm(id) {
                            var alasan = document.getElementById('alasan-' + id).value;
                            if (alasan.trim() === '') {
                                alert('Harap isi alasan penolakan!');
                                return;
                            }
                            document.getElementById('input-alasan-' + id).value = alasan;
                            document.getElementById('form-tolak-' + id).submit();
                        }
                    </script>
                @endif

            </div>
        </div>

        <div class="text-center mt-3">
            <a href="{{ route('Laporan.daftar') }}" class="btn btn-outline-primary">Kembali ke Halaman Laporan</a>
        </div>
    </div>

    @if ($laporan->foto1)
        <div class="modal fade" id="modalFoto1" tabindex="-1" aria-labelledby="modalLabel1" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalLabel1">Bukti Foto 1</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-center">
                        <img src="{{ asset('storage/' . $laporan->foto1) }}" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if ($laporan->foto2)
        <div class="modal fade" id="modalFoto2" tabindex="-1" aria-labelledby="modalLabel2" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalLabel2">Bukti Foto 2</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-center">
                        <img src="{{ asset('storage/' . $laporan->foto2) }}" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if ($laporan->foto3)
        <div class="modal fade" id="modalFoto3" tabindex="-1" aria-labelledby="modalLabel3" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalLabel3">Bukti Foto 3</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-center">
                        <img src="{{ asset('storage/' . $laporan->foto3) }}" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
