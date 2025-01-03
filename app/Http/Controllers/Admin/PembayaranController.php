<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\identitasWeb;
use App\Models\Pembayaran;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    public $pages = "Manajemen Pembayaran";

    public function index()
    {
        $logo = identitasWeb::first()->logo;
        return view('pages.admin.pembayaran.index', ["pages" => $this->pages, "logo" => $logo]);
    }

    public function cetakNota($no_pembayaran)
    {
        $pages = $this->pages;
        $data_pembayaran = Pembayaran::with("detail_pembayaran")->where("no_pembayaran", $no_pembayaran)->first();

        // Pecah nilai tahun ajaran yang dipilih menjadi tahun mulai dan tahun akhir
        list($startYear, $endYear) = explode('/', $data_pembayaran->thn_ajaran);
        $thn_ajaran_awal = $startYear;
        $thn_ajaran_akhir = $endYear;

        $tgl_bayar = $this->formatDate($data_pembayaran->tgl_bayar);
        $tgl_now = Carbon::now()->format('d F Y');
        $bulan_bayar = [];

        foreach ($data_pembayaran->detail_pembayaran as $item) {
            if ($item->bln_bayar < 7) {
                $bulan_bayar[] = $this->setBulanTahun($thn_ajaran_akhir, $item->bln_bayar);
            } else {

                $bulan_bayar[] = $this->setBulanTahun($thn_ajaran_awal, $item->bln_bayar);
            }
        }

        $nominal_spp = $data_pembayaran->total_bayar / $data_pembayaran->jmlh_bulan; // Menghitung nominal pembayaran per bulan

        return view("pages.admin.pembayaran.cetak-nota", compact("data_pembayaran", "pages", "nominal_spp", "thn_ajaran_awal", "thn_ajaran_akhir", "bulan_bayar", "tgl_bayar", "tgl_now"));
    }

    private function setBulanTahun($y, $m)
    {
        $bulanTahun = Carbon::createFromDate($y, $m)->format("F Y");

        return $bulanTahun;
    }

    //method untuk ubah format tanggal
    private function formatDate($date)
    {
        return Carbon::parse($date)->format('d F Y');
    }
}
