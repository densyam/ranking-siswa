<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Siswa</title>
    <link rel="stylesheet" href="{{ asset('css/edit_siswa.css') }}">
</head>
<body>
    <h2>Edit Data Siswa</h2>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('siswa.update', $siswa->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Nama:</label>
        <input type="text" name="nama" value="{{ old('nama', $siswa->nama) }}" required><br><br>

        <label>Kelas:</label>
        <input type="text" name="kelas" value="{{ old('kelas', $siswa->kelas) }}" required><br><br>

        <label>Jurusan:</label>
        <select name="jurusan" id="jurusan" value="{{old('jurusan', $siswa->jurusan)}}">
            <option selected disabled>{{old('jurusan', $siswa->jurusan)}}</option>
            <option value="PPLG">PPLG</option>
            <option value="DKV">DKV</option>
            <option value="AKL">AKL</option>
            <option value="TJKT">TJKT</option>
        </select>

        <button type="submit">Update</button>
    </form>
</body>
</html>
