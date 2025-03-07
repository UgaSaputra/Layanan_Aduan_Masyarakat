@extends('layouts.app')

@section('contents')
    <div class="container mt-4">
        <h2 class="text-center mb-4">Daftar Data Admin</h2>
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
                        <th>Password</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($petugas as $index => $petugasItem)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $petugasItem->name }}</td>
                            <td>{{ $petugasItem->email }}</td>
                            <td>
                                <span class="password-hidden">********</span>
                                <span class="password-text d-none">{{ $petugasItem->password }}</span>
                                <button type="button" class="btn btn-sm btn-secondary toggle-password">
                                    👁
                                </button>
                            </td>
                            <td>
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

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            document.querySelectorAll(".toggle-password").forEach(button => {
                button.addEventListener("click", function () {
                    let row = this.closest("td");
                    let hiddenPassword = row.querySelector(".password-hidden");
                    let textPassword = row.querySelector(".password-text");

                    if (textPassword.classList.contains("d-none")) {
                        textPassword.classList.remove("d-none");
                        hiddenPassword.classList.add("d-none");
                    } else {
                        textPassword.classList.add("d-none");
                        hiddenPassword.classList.remove("d-none");
                    }
                });
            });
        });
    </script>
@endsection
