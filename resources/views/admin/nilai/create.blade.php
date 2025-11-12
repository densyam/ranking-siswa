<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Nilai Siswa</title>
    <link rel="stylesheet" href="{{ asset('css/tambahnilai.css') }}">
</head>
<body>
    <h2>Tambah Nilai Siswa</h2>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('nilai.store') }}" method="POST">
        @csrf
        <label for="siswa">Siswa:</label>
        <select name="siswa_id" id="siswa" required>
            <option value="" selected disabled>Pilih Siswa</option>
            @foreach($siswa as $s)
                <option value="{{ $s->id }}">{{ $s->nama }}</option>
            @endforeach
        </select>
        <br><br>

        <table>
            <tr>
                <th>Kriteria</th>
                <th>Nilai</th>
            </tr>
            @foreach($kriteria as $k)
            <tr>
                <td>
                    {{ $k->nama_kriteria }}
                    <input type="hidden" name="kriteria_id[]" value="{{ $k->id }}">
                </td>
                <td>
                    <input type="number" name="nilai[]" placeholder="Masukkan nilai" required>
                </td>
            </tr>
            @endforeach
        </table>
        <br>

        <button type="submit">Simpan</button>
    </form>
</body>
</html>