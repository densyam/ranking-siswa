<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kriteria extends Model
{
    protected $table = 'kriteria';

    protected $fillable = [
        'nama_kriteria',
        'bobot',
        'sifat',
    ];

    public $timestamps = true;

    public function nilai()
    {
        return $this->hasMany(NilaiSiswa::class, 'kriteria_id');
    }
}
