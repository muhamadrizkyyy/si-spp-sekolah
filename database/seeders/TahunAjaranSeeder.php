<?php

namespace Database\Seeders;

use App\Models\TahunAjaran;
use Illuminate\Database\Seeder;

class TahunAjaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TahunAjaran::create([
            'thn_ajaran' => '2023/2024',
            'jumlah_spp' => 150000,
        ]);

        TahunAjaran::create([
            "thn_ajaran" => "2024/2025",
            "jumlah_spp" => 175000,
        ]);
    }
}
