<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\NilaiSiswaController;
use App\Http\Controllers\HasilSpkController;


// Auth
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/', [HasilSpkController::class, 'publicRanking'])->name('public.ranking');

// Proteksi manual tanpa middleware bawaan
Route::prefix('admin')->group(function () {
    
    // Dashboard
    Route::get('/dashboard', function () {
        if (!auth()->check()) {
            return redirect('/login')->with('error', 'Silakan login terlebih dahulu');
        }

        $totalSiswa = \App\Models\Siswa::count();
        $kriteria = \App\Models\Kriteria::all();
        return view('admin.dashboard', compact('totalSiswa', 'kriteria'));
    })->name('admin.dashboard');

    // Siswa
    Route::get('/siswa', [SiswaController::class, 'index'])->name('siswa.siswa');
    Route::get('/siswa/create', [SiswaController::class, 'create'])->name('siswa.create');
    Route::post('/siswa', [SiswaController::class, 'store'])->name('siswa.store');
    Route::get('/siswa/{siswa}', [SiswaController::class, 'show'])->name('siswa.show');
    Route::get('/siswa/{siswa}/edit', [SiswaController::class, 'edit'])->name('siswa.edit');
    Route::put('/siswa/{siswa}', [SiswaController::class, 'update'])->name('siswa.update');
    Route::delete('/siswa/{siswa}', [SiswaController::class, 'destroy'])->name('siswa.destroy');

    // Kriteria
    Route::resource('/kriteria', KriteriaController::class);

    // Nilai Siswa
    Route::resource('/nilai', NilaiSiswaController::class);

    // Hasil SPK
    Route::get('/hasil-spk', [HasilSpkController::class, 'index'])->name('hasil-spk.index');

    Route::post('/hasil-spk/hitung', [HasilSpkController::class, 'hitung'])->name('hitung-spk');
});
