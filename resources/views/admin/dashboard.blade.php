<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ranking MHS - Admin</title>
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
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
    <h1>Selamat Datang di Dashboard Admin</h1>

    <h3>Ringkasan Data</h3>
    <ul>
        <li>Total Siswa: {{ \App\Models\Siswa::count() }}</li>
    </ul>

    <h3>Data Kriteria</h3>
    <table border="1" cellpadding="5" cellspacing="0">
        <tr>
            <th>No</th>
            <th>Nama Kriteria</th>
            <th>Bobot</th>
        </tr>
        @foreach($kriteria as $index => $item)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $item->nama_kriteria }}</td>
            <td>{{ $item->bobot }}</td>
        </tr>
        @endforeach
    </table>
</body>
</html>
