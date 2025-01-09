<?php

namespace App\Http\Controllers;

use App\Models\identitasWeb;
use App\Models\Pembayaran;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MenuRiwayatController extends Controller
{
    public $pages = "Menu Riwayat Pembayaran", $logo;

    public function __construct()
    {
        $this->logo = identitasWeb::first()->logo;
    }

    public function show($no_pmbayaran)
    {
        $data_pembayaran = Pembayaran::where("no_pembayaran", $no_pmbayaran)->first();
        if ($data_pembayaran->status == "Pending") {
            $belum_bayar = true;
        }

        if ($data_pembayaran->metodePembayaran->keterangan == "BANK_TF") {
            Carbon::setLocale("id_ID");
            $durasi = now()->tomorrow();
            $durasi->locale("id");
        }
        return view("pages.siswa.riwayat-pembayaran.show", ["pages" => $this->pages, "logo" => $this->logo, "pembayaran" => $data_pembayaran, "belum_bayar" => $belum_bayar, "durasi" => $durasi->isoFormat("LL")]);
    }
}
