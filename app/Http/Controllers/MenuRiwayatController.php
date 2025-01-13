<?php

namespace App\Http\Controllers;

use App\Models\identitasWeb;
use App\Models\Pembayaran;
use App\Models\Siswa;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Duitku\Api;
use Duitku\Config;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

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
        $pembayaran = Pembayaran::where("no_pembayaran", $no_pembayaran)->first();

        //cek jika pembayaran expired
        if (!$pembayaran->user_id || $pembayaran->metode_pembayaran != "CSH") {
            $statusPembayaran = $this->checkStatus($no_pembayaran);

            if ($statusPembayaran == "02") {
                $pembayaran->status = "Failed";
                $pembayaran->save();
            } else if ($statusPembayaran == "00") {
                $pembayaran->status = "Success";
                $pembayaran->save();
            }
        }

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
            $konversi_lokal = Carbon::parse($data_pembayaran->tgl_bayar)->timezone('Asia/Jakarta');
            $durasi = $konversi_lokal->copy()->addHours(24);
            $durasi = $durasi->format("d M Y H:i:s");
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

    private function checkStatus($merchantOrderId)
    {
        $merchantCode = env("DUITKU_MERCHANT_CODE"); // WAJIB
        $apiKey = env("DUITKU_MERCHANT_KEY"); // WAJIB

        $duitkuConfig = new Config($apiKey, $merchantCode);

        $cek_pembayaran = Api::transactionStatus($merchantOrderId, $duitkuConfig);
        Log::info("Cek Pembayaran in show : ", [
            "message" => $cek_pembayaran
        ]);
        $verif = json_decode($cek_pembayaran);
        return $verif->statusCode;
    }
}
