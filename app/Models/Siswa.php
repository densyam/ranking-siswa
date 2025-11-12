<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = 'siswa';

    protected $fillable = [
        'nama',
        'kelas',
        'jurusan',
    ];

    public $timestamps = true;

    public function nilai()
    {
        return $this->hasMany(NilaiSiswa::class, 'siswa_id');
    }
    public function hasilSpk()
    {
        return $this->hasOne(HasilSpk::class, 'siswa_id');
    }
}
