@extends('layouts.app')

@section('contents')
    <div class="container">
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #f4f4f9;
                margin: 0;
                padding: 0;
            }

            .container {
                max-width: 800px;
                margin: 50px auto;
                background: #ffffff;
                border-radius: 10px;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
                overflow: hidden;
            }

            .header {
                background-color: #007bff;
                color: white;
                text-align: center;
                padding: 20px;
            }

            .header h2 {
                margin: 0;
            }

            .content {
                padding: 20px;
            }

            .content h3 {
                color: #333;
                margin-bottom: 20px;
            }

            .content table {
                width: 100%;
                border-collapse: collapse;
            }

            .content th,
            .content td {
                text-align: left;
                padding: 10px;
                border-bottom: 1px solid #ddd;
            }

            .content th {
                background-color: #f8f9fa;
                font-weight: bold;
            }

            .content td {
                color: #555;
            }

            .content .bukti {
                text-align: center;
                margin: 20px 0;
            }

            .content .bukti a {
                display: inline-block;
                text-decoration: none;
                background-color: #28a745;
                color: white;
                padding: 10px 20px;
                border-radius: 5px;
                font-size: 14px;
            }

            .content .bukti a:hover {
                background-color: #218838;
            }

            .footer {
                text-align: center;
                padding: 10px;
                background-color: #f8f9fa;
            }

            .footer a {
                text-decoration: none;
                color: #007bff;
                font-size: 14px;
            }

            .footer a:hover {
                text-decoration: underline;
            }
        </style>
        <div class="header">
            <h2>Detail Laporan</h2>
        </div>
        <div class="content">
            <h3>Informasi Laporan</h3>
            <table>
                <tr>
                    <th>Nama Pelapor</th>
                    <td>John Doe</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>johndoe@example.com</td>
                </tr>
                <tr>
                    <th>Nomor Telepon</th>
                    <td>081234567890</td>
                </tr>
                <tr>
                    <th>Kategori</th>
                    <td>Pengaduan Infrastruktur</td>
                </tr>
                <tr>
                    <th>Tanggal Kejadian</th>
                    <td>15 Januari 2025</td>
                </tr>
                <tr>
                    <th>Lokasi Kejadian</th>
                    <td>Jl. Merdeka No. 1</td>
                </tr>
                <tr>
                    <th>Deskripsi</th>
                    <td>
                        Jalan berlubang dan sangat berbahaya bagi pengendara sepeda motor, terutama saat malam hari.
                    </td>
                </tr>
            </table>

            <div class="bukti">
                <a href="#">Lihat Bukti</a>
            </div>
        </div>
        <div class="footer">
            <a href="{{ route('aduanAdmin.show')}}">Kembali ke Halaman Laporan</a>
        </div>
    </div>
@endsection
