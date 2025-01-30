@extends('layouts.app')

@section('contents')
    <div class="container mt-4">
        <h2 class="text-center mb-4">Daftar Petugas</h2>
        @if (session('success'))
            <div class="alert alert-success text-center">
                {{ session('success') }}
            </div>
        @endif

        <div class="table-container">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Tanggal</th>
                        <th>Jenis Kelamin</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($petugas as $index => $petugasItem)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $petugasItem->nama }}</td>
                            <td>{{ $petugasItem->email }}</td>
                            <td>{{ \Carbon\Carbon::parse($petugasItem->tanggal)->format('d-m-Y') }}</td>
                            <td>{{ ucfirst($petugasItem->jenis_kelamin) }}</td>
                            <td>
                                <a href="#" class="btn btn-warning btn-sm">Edit</a>
                                    <a href="{{ route('petugas.delete', $petugasItem->id) }}"
                                       class="btn btn-danger"
                                       onclick="return confirm('Yakin ingin menghapus data petugas ini?')">
                                        Hapus
                                    </a>
                                </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <style>
        .table-container {
            max-width: 1000px;
            margin: 0 auto;
            padding: 20px;
        }

        .btn-warning {
            background-color: #ffc107;
            border: none;
            transition: background-color 0.3s;
        }

        .btn-warning:hover {
            background-color: #e0a800;
        }

        .btn-danger {
            background-color: #dc3545;
            border: none;
            transition: background-color 0.3s;
        }

        .btn-danger:hover {
            background-color: #c82333;
        }

        table th, table td {
            text-align: center;
        }
    </style>
@endsection
