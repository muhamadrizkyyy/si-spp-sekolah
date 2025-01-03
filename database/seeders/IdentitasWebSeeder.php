<?php

namespace Database\Seeders;

use App\Models\identitasWeb;
use Illuminate\Database\Seeder;

class IdentitasWebSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        identitasWeb::create([
            "logo" => "-",
            "nama_institusi" => "-",
            "alamat" => "-",
            "motto" => "-",
            "email" => "-",
            "no_telp" => "-",
            "deskripsi" => "-",
            "usn_ig" => "-",
            "usn_fb" => "-",
            "usn_tiktok" => "-"
        ]);
    }
}
