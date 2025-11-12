<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Hasil SPK - Admin</title>
     <link rel="stylesheet" href="{{ asset('css/spk.css') }}">
</head>
<body>
        <div class="navbar">
            <div class="navbar-nav">
                <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                <a href="{{ route('siswa.siswa') }}">Data Siswa</a>
                <a href="{{ route('nilai.index') }}">Nilai Siswa</a>
                <a href="{{ route('hasil-spk.index') }}">Hitung Ranking Siswa</a>
                <a href="{{ route('logout') }}" onclick="return confirm('Apakah anda ingin logout?')">Logout</a>
            </div>
        </div>
        <h1>Hasil Perhitungan Nilai Siswa</h1>

    <form action="{{ route('hitung-spk') }}" method="POST">
        @csrf
        <button type="submit" onclick="return confirm('Hitung ulang nilai siswa?')"> Hitung Ulang Nilai </button>
    </form>

    <table border="1" cellpadding="6" cellspacing="0">
        <thead>
            <tr>
                <th>Ranking</th>
                <th>Nama Siswa</th>
                <th>Jurusan</th>
                <th>Nilai Akhir</th>
            </tr>
        </thead>
        <tbody>
            @forelse($hasil as $row)
                <tr>
                    <td>{{ $row->ranking }}</td>
                    <td>{{ $row->siswa->nama }}</td>
                    <td>{{ $row->siswa->jurusan }}</td>
                    <td>{{ number_format($row->nilai_total, 2) }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">Belum ada hasil SPK</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>
