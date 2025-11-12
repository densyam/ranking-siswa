<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Data Siswa</title>
  <link rel="stylesheet" href="{{ asset('css/siswa.css') }}">

</head>
<body>
    <div class="navbar">
        <div class="navbar-nav">
            <a href="{{ route('admin.dashboard') }}">Dashboard</a>
            <a href="{{ route('siswa.siswa') }}">Data Siswa</a>
            <a href="{{ route('nilai.index') }}">Nilai Siswa</a>
            <a href="{{ route('hasil-spk.index') }}">Hitung Ranking Siswa</a>
            <a href="{{ route('logout') }}" onclick="return confirm('Apakah anda ingin logout?')">Logout</a>
            <h1>Data Siswa</h1>
        </div>
    </div>
    <h1>Data Siswa</h1>
    <a href="{{ route('siswa.create') }}">Tambah Siswa</a>
    <table border="1" cellpadding="5" cellspacing="0">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Kelas</th>
            <th>Jurusan</th>
            <th>Aksi</th>
        </tr>
        @foreach($siswa as $index => $item)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $item->nama }}</td>
            <td>{{ $item->kelas }}</td>
            <td>{{ $item->jurusan }}</td>
            <td>
                <a href="{{ route('siswa.edit', $item->id) }}">Edit</a>
                <form action="{{ route('siswa.destroy', $item->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Apakah anda yakin ingin menghapus siswa?')">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</body>
</html>
