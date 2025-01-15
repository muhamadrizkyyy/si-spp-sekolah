<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\identitasWeb;
use App\Models\Siswa;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public $logo, $identitas_web;

    public function __construct()
    {
        $identitas_web = identitasWeb::first();
        $this->logo = $identitas_web->logo;
        $this->identitas_web = $identitas_web;
    }

    public function index()
    {
        $identitas_web = $this->identitas_web;
        $pages = $identitas_web->nama_institusi;
        $logo = $this->logo;
        $no_telp = $identitas_web->no_telp;
        $siswaLogin = false;

        if (session()->has('nisn')) {
            $siswaLogin = Siswa::where('nisn', session("nisn"))->first();
        }

        return view("pages.siswa.landing.index", compact(
            "identitas_web",
            "pages",
            "logo",
            "no_telp",
            "siswaLogin"
        ));
    }
}
