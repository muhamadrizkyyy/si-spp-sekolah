<?php

namespace Database\Seeders;

use App\Models\Kelas;
use Illuminate\Database\Seeder;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Kelas::create([
            'kode_kelas' => 'X RPL 1',
        ]);

        Kelas::create([
            'kode_kelas' => 'X RPL 2',
        ]);

        Kelas::create([
            'kode_kelas' => 'X RPL 3',
        ]);
    }
}
