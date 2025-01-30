@extends('layouts.app')

@section('contents')
<div class="container mt-5">
    <h2 class="mb-4">Daftar Laporan</h2>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- Filter Laporan -->
    <div class="mb-3">
        <form>
            <div class="form-group row">
                <label for="status" class="col-sm-2 col-form-label">Filter Status</label>
                <div class="col-sm-4">
                    <select id="status" class="form-control">
                        <option value="">Semua</option>
                        <option value="diterima">Diterima</option>
                        <option value="ditolak">Ditolak</option>
                    </select>
                </div>
                <div class="col-sm-2">
                    <button type="button" class="btn btn-primary">Terapkan</button>
                </div>
            </div>
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
                        <th>Nama Pelapor</th>
                        <th>Kategori</th>
                        <th>Deskripsi</th>
                        <th>Status</th>
                        <th>Alasan Penolakan</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Samsudin</td>
                        <td>Pengaduan Infrastruktur</td>
                        <td>Jalan berlubang di Jl. Merdeka No. 1</td>
                        <td>
                            <span class="badge badge-success">Diterima</span>
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Damar</td>
                        <td>Pengaduan Kebersihan</td>
                        <td>Sampah menumpuk di taman kota</td>
                        <td>
                            <span class="badge badge-danger">Ditolak</span>
                        </td>
                        <td>Kategori tidak sesuai.</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Dimas</td>
                        <td>Pengaduan Infrastruktur</td>
                        <td>Lampu jalan mati di Jl. Sudirman</td>
                        <td>
                            <span class="badge badge-secondary">Menunggu</span>
                        </td>
                        <td>-</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
