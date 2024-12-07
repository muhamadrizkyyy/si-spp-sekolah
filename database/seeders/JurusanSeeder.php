<?php

namespace Database\Seeders;

use App\Models\Jurusan;
use Illuminate\Database\Seeder;

class JurusanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Jurusan::create([
            "kode_jurusan" => "RPL"
        ]);

        Jurusan::create([
            "kode_jurusan" => "LPS"
        ]);

        Jurusan::create([
            "kode_jurusan" => "DKV"
        ]);

        Jurusan::create([
            "kode_jurusan" => "APHP"
        ]);

        Jurusan::create([
            "kode_jurusan" => "KLNR"
        ]);
    }
}
