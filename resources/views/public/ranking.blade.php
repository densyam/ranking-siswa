<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Ranking Kelas 12</title>
    <link rel="stylesheet" href="css/ranking.css">
</head>
<body class="page-body">

    <div class="container">
        <h1 class="page-title">Ranking Kelas XII Multistudi High School</h1>

        <form method="GET" action="{{ route('public.ranking') }}" class="filter-form">
            <div class="filter-group">
                <select name="jurusan" class="filter-select" onchange="this.form.submit()">
                    <option value="">Semua Jurusan</option>
                    @foreach(\App\Models\Siswa::select('jurusan')->distinct()->get() as $item)
                        <option value="{{ $item->jurusan }}" {{ request('jurusan') == $item->jurusan ? 'selected' : '' }}>
                            {{ $item->jurusan }}
                        </option>
                    @endforeach
                </select>
            </div>
        </form>

        <table border="1">
            <thead>
                <tr>
                    <th>Ranking</th>
                    <th>Nama Siswa</th>
                    <th>Jurusan</th>
                    <th>Nilai Akhir</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($hasil as $row)
                    <tr>
                        <td class="text-center">{{ $row->ranking }}</td>
                        <td>{{ $row->siswa->nama }}</td>
                        <td>{{ $row->siswa->jurusan }}</td>
                        <td class="text-right">{{ number_format($row->nilai_total, 2) }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="no-data">Belum ada data hasil SPK</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</body>
</html>
