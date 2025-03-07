@extends('layouts.app')

@section('contents')
    <link rel="stylesheet" href="{{ asset('style.css/dashboard.css') }}">
    <section class="content-header">
        <h1>
            Dashboard
            <small>Layanan Aduan Masyarakat</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- Info boxes -->
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3>{{ $jumlahlaporan }}</h3>
                        <p>Aduan Masuk</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-bell"></i>
                    </div>
                    <a href="{{ route('Laporan.daftar') }}" class="small-box-footer">
                        Lihat Data<i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>

            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3>{{ $aduanSelesai }}</h3>
                        <p>Aduan Selesai</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-check-circle"></i>
                    </div>
                    <a href="{{ route('Laporan.daftar', ['status' => 'selesai']) }}" class="small-box-footer">Lihat Data<i
                            class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3>{{ $menunggukonfirmasi }}</h3>
                        <p>Menunggu konfirmasi</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-spinner"></i>
                    </div>
                    <a href="{{ route('Laporan.daftar', ['status' => 'menunggu konfirmasi']) }}"
                        class="small-box-footer">Lihat Data<i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-red">
                    <div class="inner">
                        <h3>{{ $aduanDitolak }}</h3>
                        <p>Aduan Ditolak</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-times-circle"></i>
                    </div>
                    <a href="{{ route('Laporan.daftar', ['status' => 'ditolak']) }}" class="small-box-footer">Lihat Data <i
                            class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3>{{ $aduanDikerjakan }}</h3>
                        <p>Aduan Dikerjakan</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-spinner"></i>
                    </div>
                    <a href="{{ route('Laporan.daftar', ['status' => 'dikerjakan']) }}" class="small-box-footer">Lihat
                        Data<i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>

        <!-- Main row -->
        <div class="row">
            <!-- Left col -->
            <section class="col-lg-7 connectedSortable">
                <div class="box box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title">Statistik Aduan</h3>
                    </div>
                    <div class="box-body">
                        <canvas id="aduan-chart"></canvas>
                    </div>
                </div>
            </section>

            <!-- Tambahkan Chart.js -->
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    var ctx = document.getElementById('aduan-chart').getContext('2d');

                    var aduanChart = new Chart(ctx, {
                        type: 'bar', // Bisa diganti dengan 'pie', 'line', atau 'doughnut'
                        data: {
                            labels: @json(array_keys($statistikAduan->toArray())), // Ambil label status dari database
                            datasets: [{
                                label: 'Jumlah Aduan',
                                data: @json(array_values($statistikAduan->toArray())), // Ambil jumlah aduan per status
                                backgroundColor: ['red', 'yellow', 'blue', 'green', 'gray'],
                                borderWidth: 1
                            }]
                        },
                        options: {
                            responsive: true,
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            }
                        }
                    });
                });
            </script>

            <!-- Right col -->
            <section class="col-lg-5 connectedSortable">
                <div class="box box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title">Aduan Terbaru</h3>
                    </div>
                    <div class="box-body">
                        <ul class="list-unstyled">
                            @foreach ($aduanTerbaru as $aduan)
                                <li>
                                    <i class="fa fa-user"></i>
                                    <strong>{{ $aduan->jenis_laporan }}:</strong> {{ $aduan->alamat }}

                                    @php
                                        $status = trim(strtolower($aduan->status));
                                    @endphp

                                    @if ($status == 'ditolak')
                                        <span class="badge bg-red">Ditolak</span>
                                    @elseif ($status == 'diproses')
                                        <span class="badge bg-yellow">Proses</span>
                                    @elseif ($status == 'selesai')
                                        <span class="badge bg-green">Selesai</span>
                                    @elseif ($status == 'dikerjakan')
                                        <span class="badge bg-blue">Dikerjakan</span>
                                    @else
                                        <span class="badge bg-gray">Menunggu</span>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </section>

        </div>
    </section>
@endsection
