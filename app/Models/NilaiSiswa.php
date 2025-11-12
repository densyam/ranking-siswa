<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NilaiSiswa extends Model
{
    protected $table = 'nilai_siswa';

    protected $fillable = [
        'siswa_id',
        'kriteria_id',
        'nilai',
    ];

    public $timestamps = true;

    public function siswa()
    {
        return $this->belongsTO(Siswa::class, 'siswa_id');
    }

    public function kriteria()
    {
        return $this->belongsTo(Kriteria::class, 'kriteria_id');
    }
}
