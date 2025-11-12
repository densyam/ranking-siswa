<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Kriteria;
use App\Models\NilaiSiswa;
use Illuminate\Http\Request;

class NilaiSiswaController extends Controller
{
    public function index()
    {
        $nilai = NilaiSiswa::with(['siswa', 'kriteria'])->get();
        return view('admin.nilai.index', compact('nilai'));
    }

    public function create()
    {
        $siswa = Siswa::all();
        $kriteria = Kriteria::all();
        return view('admin.nilai.create', compact('siswa', 'kriteria'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'siswa_id' => 'required|exists:siswa,id',
            'kriteria_id' => 'required|array',
            'nilai' => 'required|array',
        ]);

        foreach ($request->kriteria_id as $index => $kriteriaId) {
            \App\Models\NilaiSiswa::updateOrCreate(
                [
                    'siswa_id' => $request->siswa_id,
                    'kriteria_id' => $kriteriaId,
                ],
                [
                    'nilai' => $request->nilai[$index],
                ]
            );
        }

        return redirect()->route('nilai.index')->with('success', 'Nilai siswa berhasil disimpan!');
    }

    public function edit($id)
    {
        $nilai = NilaiSiswa::findOrFail($id);
        $siswa = Siswa::all();
        $kriteria = Kriteria::all();
        return view('admin.nilai.edit', compact('nilai', 'siswa', 'kriteria'));
    }

    public function update(Request $request, $id)
    {
        $nilai = NilaiSiswa::findOrFail($id);
        $nilai->update($request->all());
        return redirect()->route('nilai.index')->with('success', 'Nilai siswa berhasil diperbarui');
    }

    public function destroy($id)
    {
        NilaiSiswa::destroy($id);
        return back()->with('success', 'Nilai siswa berhasil dihapus');
    }
}
