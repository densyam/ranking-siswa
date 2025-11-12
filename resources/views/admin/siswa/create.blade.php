<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Siswa</title>
    <link rel="stylesheet" href="{{ asset('css/tambahsiswa.css') }}">
</head>
<body>
    <h2>Tambah Data Siswa</h2>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('siswa.store') }}" method="POST">
        @csrf
        <label>Nama:</label>
        <input type="text" name="nama" placeholder="Nama" required><br><br>

        <label>Kelas:</label>
        <input type="text" name="kelas" placeholder="Kelas" required><br><br>

        <label>Jurusan:</label>
        <select name="jurusan" id="jurusan">
            <option value="PPLG">PPLG</option>
            <option value="DKV">DKV</option>
            <option value="AKL">AKL</option>
            <option value="TJKT">TJKT</option>
        </select>

        <button type="submit">Simpan</button>
    </form>
</body>
</html>