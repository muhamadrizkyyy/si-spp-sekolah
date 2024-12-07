<?php

namespace Database\Seeders;

use App\Models\Siswa;
use Illuminate\Database\Seeder;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Siswa::create([
            "nisn" => "0064628498",
            'nama' => 'Muhammad Fadil',
            "gender" => "L",
            "tgl_lahir" => "2006-12-01",
            'alamat' => 'Jl. Jendral Sudirman',
            'kelas_id' => 1,
            'jurusan_id' => 1,
            "thn_ajaran" => "2023/2024",
            "thn_ajaran_masuk" => "2023/2024",
        ]);

        Siswa::create([
            "nisn" => "00793876452",
            'nama' => 'Della Sari',
            "gender" => "P",
            "tgl_lahir" => "2007-07-17",
            'alamat' => 'Jl. Gatot Subroto',
            'kelas_id' => 2,
            'jurusan_id' => 1,
            "thn_ajaran" => "2023/2024",
            "thn_ajaran_masuk" => "2023/2024",
        ]);
    }
}
