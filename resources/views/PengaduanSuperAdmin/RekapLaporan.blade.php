@extends('layouts.app')

@section('contents')
    <title>Laporan Berdasarkan Wilayah</title>
    <link rel="stylesheet" href="{{ asset('style.css/rekap.css') }}">


    <div class="container">
        <h1 class="title">Laporan Berdasarkan Wilayah</h1>

        <div class="filter-container">
            <label for="kabupaten">Pilih Kabupaten di Jawa Tengah:</label>
            <select id="kabupaten" name="kabupaten" onchange="filterKabupaten()">
                <option value="" disabled selected >-- Pilih Kabupaten --</option>
                <option value="Banjarnegara" {{ request('kabupaten') == 'Banjarnegara' ? 'selected' : '' }}>Banjarnegara</option>
                <option value="Banyumas" {{ request('kabupaten') == 'Banyumas' ? 'selected' : '' }}>Banyumas</option>
                <option value="Batang" {{ request('kabupaten') == 'Batang' ? 'selected' : '' }}>Batang</option>
                <option value="Blora" {{ request('kabupaten') == 'Blora' ? 'selected' : '' }}>Blora</option>
                <option value="Boyolali" {{ request('kabupaten') == 'Boyolali' ? 'selected' : '' }}>Boyolali</option>
                <option value="Brebes" {{ request('kabupaten') == 'Brebes' ? 'selected' : '' }}>Brebes</option>
                <option value="Cilacap" {{ request('kabupaten') == 'Cilacap' ? 'selected' : '' }}>Cilacap</option>
                <option value="Demak" {{ request('kabupaten') == 'Demak' ? 'selected' : '' }}>Demak</option>
                <option value="Grobogan" {{ request('kabupaten') == 'Grobogan' ? 'selected' : '' }}>Grobogan</option>
                <option value="Jepara" {{ request('kabupaten') == 'Jepara' ? 'selected' : '' }}>Jepara</option>
                <option value="Karanganyar" {{ request('kabupaten') == 'Karanganyar' ? 'selected' : '' }}>Karanganyar</option>
                <option value="Kendal" {{ request('kabupaten') == 'Kendal' ? 'selected' : '' }}>Kendal</option>
                <option value="Klaten" {{ request('kabupaten') == 'Klaten' ? 'selected' : '' }}>Klaten</option>
                <option value="Kudus" {{ request('kabupaten') == 'Kudus' ? 'selected' : '' }}>Kudus</option>
                <option value="Magelang" {{ request('kabupaten') == 'Magelang' ? 'selected' : '' }}>Magelang</option>
                <option value="Pati" {{ request('kabupaten') == 'Pati' ? 'selected' : '' }}>Pati</option>
                <option value="Pekalongan" {{ request('kabupaten') == 'Pekalongan' ? 'selected' : '' }}>Pekalongan</option>
                <option value="Pemalang" {{ request('kabupaten') == 'Pemalang' ? 'selected' : '' }}>Pemalang</option>
                <option value="Purbalingga" {{ request('kabupaten') == 'Purbalingga' ? 'selected' : '' }}>Purbalingga</option>
                <option value="Purworejo" {{ request('kabupaten') == 'Purworejo' ? 'selected' : '' }}>Purworejo</option>
                <option value="Rembang" {{ request('kabupaten') == 'Rembang' ? 'selected' : '' }}>Rembang</option>
                <option value="Semarang" {{ request('kabupaten') == 'Semarang' ? 'selected' : '' }}>Semarang</option>
                <option value="Sragen" {{ request('kabupaten') == 'Sragen' ? 'selected' : '' }}>Sragen</option>
                <option value="Sukoharjo" {{ request('kabupaten') == 'Sukoharjo' ? 'selected' : '' }}>Sukoharjo</option>
                <option value="Tegal" {{ request('kabupaten') == 'Tegal' ? 'selected' : '' }}>Tegal</option>
                <option value="Temanggung" {{ request('kabupaten') == 'Temanggung' ? 'selected' : '' }}>Temanggung</option>
                <option value="Wonogiri" {{ request('kabupaten') == 'Wonogiri' ? 'selected' : '' }}>Wonogiri</option>
                <option value="Wonosobo" {{ request('kabupaten') == 'Wonosobo' ? 'selected' : '' }}>Wonosobo</option>
            </select>
        </div>



        <table class="report-table">
            <thead>
                <tr>
                    <th>ID Laporan</th>
                    <th>Jenis Laporan</th>
                    <th>Kabupaten</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($laporan as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->jenis_laporan }}</td>
                        <td>{{ ucfirst($item->kabupaten) }}</td>
                        <td>{{ ucfirst($item->status) }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">Tidak ada data laporan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="pagination">
            {{ $laporan->appends(['kabupaten' => request('kabupaten')])->links() }}
        </div>
    </div>

    <script>
        function filterKabupaten() {
            var kabupaten = document.getElementById('kabupaten').value;
            window.location.href = '?kabupaten=' + kabupaten;
        }
    </script>
@endsection
