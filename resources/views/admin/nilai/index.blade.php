<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Nilai Siswa</title>
    <link rel="stylesheet" href="{{ asset('css/nilai.css') }}">
</head>
<body>
        <div class="navbar">
            <a href="{{ route('admin.dashboard') }}">Dashboard</a>
            <a href="{{ route('siswa.siswa') }}">Data Siswa</a>
            <a href="{{ route('nilai.index') }}">Nilai Siswa</a>
            <a href="{{ route('hasil-spk.index') }}">Hitung Ranking Siswa</a>
            <a href="{{ route('logout') }}" onclick="return confirm('Apakah anda ingin logout?')">Logout</a>
        </div>
    <h1>Nilai Siswa</h1>
    <a href="{{ route('nilai.create') }}">Tambah Nilai</a>
    <table border="1" cellpadding="5" cellspacing="0">
        <tr>
            <th>No</th>
            <th>Nama Siswa</th>
            <th>Kriteria</th>
            <th>Nilai</th>
            <th>Aksi</th>
        </tr>
        @foreach($nilai as $index => $item)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $item->siswa->nama }}</td>
            <td>{{ $item->kriteria->nama_kriteria }}</td>
            <td>{{ $item->nilai }}</td>
            <td>
                <form action="{{ route('nilai.destroy', $item->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Hapus nilai ini?')">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</body>
</html>
