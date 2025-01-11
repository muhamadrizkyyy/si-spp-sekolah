<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\identitasWeb;
use App\Models\Pembayaran;
use App\Models\Siswa;
use Illuminate\Http\Request;

class MenuDashboardController extends Controller
{
    public $pages = "Dashboard";
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
        $data_pembayaran = Pembayaran::where("nisn", session("nisn"))->orderby("id", "desc")->limit(3)->get();

        $byr_thn_ajaran = Pembayaran::where("thn_ajaran", $siswaLogin->thn_ajaran)->where("nisn", $siswaLogin->nisn)->where("status", "Success")->get();
        $byr_all = Pembayaran::where("nisn", $siswaLogin->nisn)->where("status", "Success")->get();

        list($startYearStart, $endYearStart) = explode("/", $siswaLogin->thn_ajaran_masuk);
        list($startYearNow, $endYearNow) = explode("/", $siswaLogin->thn_ajaran);

        if ($siswaLogin->thn_ajaran == $siswaLogin->thn_ajaran_masuk) {
            $bulan_all = 12;
        } else {
            $bulan_all = (($startYearNow - $startYearStart + 1) * 12);
        }

        return view("pages.siswa.dashboard.index", compact("pages", "logo", "identitas_web", "siswaLogin", "byr_thn_ajaran", "byr_all", "bulan_all", "data_pembayaran"));
    }
}
