@extends('layouts.app')

@section('contents')
<link rel="stylesheet" href="{{ asset('style.css/dashboard.css') }}">
    <section class="content-header">
        <h1>
            Dashboard
            <small>Admin Layanan Aduan Masyarakat</small>
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
                        <h3>120</h3>
                        <p>Aduan Masuk</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-bell"></i>
                    </div>
                    <a href="#" class="small-box-footer">Lihat Aduan <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3>75</h3>
                        <p>Aduan Selesai</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-check-circle"></i>
                    </div>
                    <a href="#" class="small-box-footer">Lihat Detail <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3>45</h3>
                        <p>Aduan Proses</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-spinner"></i>
                    </div>
                    <a href="#" class="small-box-footer">Lihat Proses <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-red">
                    <div class="inner">
                        <h3>5</h3>
                        <p>Aduan Ditolak</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-times-circle"></i>
                    </div>
                    <a href="#" class="small-box-footer">Lihat Aduan <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>

        <!-- Main row -->
        <div class="row">
            <!-- Left col -->
            <section class="col-lg-7 connectedSortable">
                <!-- Custom content here -->
                <div class="box box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title">Statistik Aduan</h3>
                    </div>
                    <div class="box-body">
                        <!-- Bisa ditambahkan grafik atau chart terkait statistik aduan -->
                        <div id="aduan-chart"></div>
                    </div>
                </div>
            </section>

            <!-- Right col -->
            <section class="col-lg-5 connectedSortable">
                <!-- Custom content here -->
                <div class="box box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title">Aduan Terbaru</h3>
                    </div>
                    <div class="box-body">
                        <ul class="list-unstyled">
                            <li>
                                <i class="fa fa-user"></i> <strong>Dimas:</strong> Laporan kerusakan jalan
                                <span class="badge bg-red">Baru</span>
                            </li>
                            <li>
                                <i class="fa fa-user"></i> <strong>Saiman Saputra:</strong> Keluhan mengenai kebersihan
                                <span class="badge bg-yellow">Proses</span>
                            </li>
                            <li>
                                <i class="fa fa-user"></i> <strong>Michael Prasetio:</strong> Permintaan perbaikan lampu jalan
                                <span class="badge bg-green">Selesai</span>
                            </li>
                            <li>
                                <i class="fa fa-user"></i> <strong>Saras Putri:</strong> Aduan terkait sampah yang menumpuk
                                <span class="badge bg-red">Ditolak</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </section>
        </div>
    </section>
@endsection
