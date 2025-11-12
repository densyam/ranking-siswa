<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Kriteria;
use App\Models\NilaiSiswa;
use App\Models\HasilSpk;
use Illuminate\Http\Request;

class HasilSpkController extends Controller
{
    public function index()
    {
        $hasil = HasilSpk::with('siswa')->orderBy('ranking', 'asc')->get();
        return view('admin.hasil_spk.index', compact('hasil'));
    } 

    public function publicRanking(Request $request)
    {
        $jurusan = $request->get('jurusan');

        $hasil = HasilSpk::with('siswa')
            ->when($jurusan, function($query) use ($jurusan) {
                return $query->whereHas('siswa', function($q) use ($jurusan) {
                    $q->where('jurusan', $jurusan);
                });
            })
            ->orderBy('ranking', 'asc')
            ->get();

        return view('public.ranking', compact('hasil', 'jurusan'));
    }

    public function hitung()
    {
        // Ambil semua siswa dan kriteria
        $siswa = Siswa::all();
        $kriteria = Kriteria::all();

        $hasil = [];

        // Hitung total nilai untuk setiap siswa
        foreach ($siswa as $row) {
            $total = 0;

            foreach ($kriteria as $krit) {
                $nilai = NilaiSiswa::where('siswa_id', $row->id)
                    ->where('kriteria_id', $krit->id)
                    ->value('nilai');

                $total += $nilai * $krit->bobot;
            }

            $hasil[] = [
                'siswa_id' => $row->id,
                'nilai_akhir' => $total
            ];
        }

        // Urutkan berdasarkan nilai_akhir (descending)
        usort($hasil, function ($a, $b) {
            return $b['nilai_akhir'] <=> $a['nilai_akhir'];
        });

        // Simpan hasil dengan ranking
        foreach ($hasil as $index => $data) {
            HasilSpk::updateOrCreate(
                ['siswa_id' => $data['siswa_id']],
                [
                    'nilai_total' => $data['nilai_akhir'],
                    'ranking' => $index + 1
                ]
            );
        }

        return back()->with('success', 'Perhitungan SPK selesai');
    }

}
