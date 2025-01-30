@extends('layouts.app')

@section('contents')
    <title>Rekap Laporan</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f7fa;
            color: #333;
        }

        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .title {
            text-align: center;
            margin-bottom: 20px;
            font-size: 24px;
            color: #4CAF50;
        }

        .report-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .report-table th, .report-table td {
            padding: 12px;
            text-align: center;
            border: 1px solid #ddd;
        }

        .report-table th {
            background-color: #4CAF50;
            color: white;
        }

        .report-table tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .export-btn {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 8px 16px;
            cursor: pointer;
            border-radius: 5px;
            margin: 5px;
            transition: background-color 0.3s;
        }

        .export-btn:hover {
            background-color: #45a049;
        }

        .export-buttons {
            text-align: center;
        }

        .export-buttons button {
            background-color: #2196F3;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
            margin: 10px;
            transition: background-color 0.3s;
        }

        .export-buttons button:hover {
            background-color: #1976D2;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="title">Rekap Laporan</h1>

        <!-- Tabel Laporan -->
        <table class="report-table">
            <thead>
                <tr>
                    <th>ID Laporan</th>
                    <th>Nama Karyawan</th>
                    <th>Tanggal</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>01</td>
                    <td>John Doe</td>
                    <td>02-07-2025</td>
                    <td>Aktif</td>
                    <td>
                        <div class="export-buttons">
                            <form action="#" method="POST">
                                @csrf
                                <button type="submit" class="export-btn">Ekspor ke Excel</button>
                                <form action="#" method="POST">
                                    @csrf
                                    <button type="submit" class="export-btn">Ekspor ke PDF</button>
                                </form>
                            </form>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>02</td>
                    <td>Jane Smith</td>
                    <td>22-06-2025</td>
                    <td>Berhenti</td>
                    <td>
                        <div class="export-buttons">
                            <form action="#" method="POST">
                                @csrf
                                <button type="submit" class="export-btn">Ekspor ke Excel</button>
                                <form action="#" method="POST">
                                    @csrf
                                    <button type="submit" class="export-btn">Ekspor ke PDF</button>
                                </form>
                            </form>
                        </div>
                    </td>
                </tr>
                <!-- Tambah baris sesuai dengan data -->
            </tbody>
        </table>

        <!-- Tombol Ekspor Laporan -->
        <div class="export-buttons">
            <button class="export-btn">Ekspor Semua ke Excel</button>
            <button class="export-btn">Ekspor Semua ke PDF</button>
        </div>
    </div>
@endsection
