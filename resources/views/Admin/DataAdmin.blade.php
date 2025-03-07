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
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($admin as $index => $adminItem)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $adminItem->name }}</td>
                            <td>{{ $adminItem->email }}</td>
                            <td>
                                    <a href="{{ route('admin.delete', $adminItem->id) }}"
                                       class="btn btn-danger"
                                       onclick="return confirm('Yakin ingin menghapus data admin ini?')">
                                        Hapus
                                    </a>
                                </td>
                        </tr>
                    @endforeach
                </tbody>
                {{-- <div class="export-buttons">
                    <form action="{{ route('export.pdf') }}" method="POST">
                        @csrf
                        <button type="submit" class="export-btn">Ekspor ke PDF</button>
                    </form>
                </div> --}}

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

        .export-btn {
            background-color: #9eb09e;
            color: white;
            border: none;
            padding: 8px 16px;
            text-decoration: none;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
            margin: 5px;
            transition: background-color 0.3s;
        }

        .export-btn:hover {
            background-color: #041405;
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
