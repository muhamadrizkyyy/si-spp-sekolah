<?php

namespace App\Http\Livewire\Auth\Siswa;

use App\Models\identitasWeb;
use App\Models\Siswa;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class LoginSiswa extends Component
{
    public $nisn, $tgl_lahir, $logo, $no_telp;
    public $pages = "Login Siswa";

    public function mount()
    {
        //cek apakah siswa sudah login
        if (session()->has("nisn")) {
            return redirect()->route("dashboardSiswa");
        }

        $identitas_web = identitasWeb::first();

        $this->logo = $identitas_web->logo;
        $this->no_telp = $identitas_web->no_telp;
    }

    public function login()
    {
        $this->validate([
            "nisn" => "required",
            "tgl_lahir" => "required"
        ]);

        $siswa = Siswa::where("nisn", $this->nisn)->where("tgl_lahir", $this->tgl_lahir)->first();

        if ($siswa) {
            // set session data siswa
            session([
                "nama" => $siswa->nama,
                "nisn" => $siswa->nisn,
                "thn_ajaran" => $siswa->thn_ajaran,
            ]);
            return redirect()->route("dashboardSiswa");
        } else {
            return back()->with("status", "error")->with("message", "Kombinasi NISN dan tanggal lahir salah, silahkan coba kembali");
        }
    }

    public function logout()
    {
        session()->flush();
        return redirect()->route("login.siswa")->with("status", "success")->with("msg", "Berhasil Logout");
    }

    public function render()
    {
        return view('livewire.auth.siswa.login-siswa')->layout("layouts.auth", ["pages" => $this->pages, "logo" => $this->logo]);
    }
}
