<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SiswaSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('siswa')->insert([
            [
                'nama' => 'Ahmad Zaki',
                'kelas' => 'XII PPLG 1',
                'jurusan' => 'PPLG',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Budi Santoso',
                'kelas' => 'XII TJKT 1',
                'jurusan' => 'TJKT',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Citra Dewi',
                'kelas' => 'XII DKV 1',
                'jurusan' => 'DKV',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Dewi Lestari',
                'kelas' => 'XII AKL 1',
                'jurusan' => 'AKL',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
