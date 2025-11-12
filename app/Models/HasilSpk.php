<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HasilSpk extends Model
{
    protected $table = 'hasil_spk';
    protected $fillable = [
        'siswa_id',
        'nilai_total',
        'ranking',
    ];

    public $timestamps = true;

    public function Siswa()
    {
        return $this->belongsTo(Siswa::class, 'siswa_id');
    }
}
