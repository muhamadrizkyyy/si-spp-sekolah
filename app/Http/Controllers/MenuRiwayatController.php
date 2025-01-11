<?php

namespace App\Http\Controllers;

use App\Models\identitasWeb;
use App\Models\Pembayaran;
use App\Models\Siswa;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MenuRiwayatController extends Controller
{
    public $pages = "Menu Riwayat Pembayaran";
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

        $no_telp = ltrim($this->identitas_web->no_telp, "0");
        return view("pages.siswa.riwayat-pembayaran.index", compact("pages", "logo", "identitas_web", "siswaLogin", "no_telp"));
    }

    public function show($no_pembayaran)
    {
        $pages = $this->pages;
        $logo = $this->logo;
        $identitas_web = $this->identitas_web;
        $siswaLogin = Siswa::where("nisn", session("nisn"))->first();
        $no_telp = $identitas_web->no_telp;

        $data_pembayaran = Pembayaran::where("no_pembayaran", $no_pembayaran)->first();
        $belum_bayar = false;
        if ($data_pembayaran->status == "Pending") {
            $belum_bayar = true;
        }

        $durasi = "";
        if ($data_pembayaran->metodePembayaran->keterangan == "BANK_TF") {
            Carbon::setLocale("id_ID");
            $durasi = now()->tomorrow();
            $durasi->locale("id");
            $durasi = $durasi->isoFormat("LL");
        }
        return view("pages.siswa.riwayat-pembayaran.show", [
            "pages" => $this->pages,
            "logo" => $this->logo,
            "pembayaran" => $data_pembayaran,
            "belum_bayar" => $belum_bayar,
            "durasi" => $durasi,
            "identitas_web" => $identitas_web,
            "siswaLogin" => $siswaLogin,
            "no_telp" => $no_telp,
        ]);
    }

    public function cetakLaporan()
    {
        $data_pembayaran = Pembayaran::join("detail_pembayaran", function ($join) {
            $join->on("pembayaran.id", "=", "detail_pembayaran.pembayaran_id")
                ->where("pembayaran.nisn", "=", session("selected_siswa"))
                ->where("pembayaran.thn_ajaran", "=", session("selected_thn_ajaran"));
        })
            ->rightJoin("view_daftar_bulan", "view_daftar_bulan.bulan", "=", "detail_pembayaran.bln_bayar")
            ->get();;

        $data_siswa = Siswa::where("nisn", "=", session("selected_siswa"))->first();

        // Pecah nilai tahun ajaran yang dipilih menjadi tahun mulai dan tahun akhir
        list($startYear, $endYear) = explode('/', session("selected_thn_ajaran"));
        $thn_ajaran_awal = $startYear;
        $thn_ajaran_akhir = $endYear;

        $identitas_web = identitasWeb::first();

        $pdf = Pdf::loadView("livewire.admin.laporan.laporan-pdf", [
            "data_pembayaran" => $data_pembayaran,
            "data_siswa" => $data_siswa,
            "thn_ajaran" => session("selected_thn_ajaran"),
            "thn_ajaran_awal" => $thn_ajaran_awal,
            "thn_ajaran_akhir" => $thn_ajaran_akhir,
            "identitas_web" => $identitas_web,
        ]);

        $pdf->setOption('isHtml5ParserEnabled', true);
        $pdf->setOption('isPhpEnabled', true);
        return $pdf->stream();

        //hapus sesi
        session()->forget(["selected_siswa", "selected_thn_ajaran"]);
    }
}
