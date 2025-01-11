<?php

namespace App\Http\Controllers;

use App\Models\identitasWeb;
use App\Models\Siswa;
use Illuminate\Http\Request;

class MenuProfileController extends Controller
{
    public $pages = "Profile Siswa";
    public $logo, $identitas_web;

    public function __construct()
    {
        $identitas_web = identitasWeb::first();
        $this->logo = $identitas_web->logo;
        $this->identitas_web = $identitas_web;
    }

    public function index()
    {
        $pages = $this->pages;
        $logo = $this->logo;
        $identitas_web = $this->identitas_web;
        $siswaLogin = Siswa::where("nisn", session("nisn"))->first();

        return view("pages.siswa.profile.index", compact(
            "pages",
            "logo",
            "identitas_web",
            "siswaLogin"
        ));
    }
}
