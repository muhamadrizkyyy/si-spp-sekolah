<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DetailPembayaran;
use App\Models\identitasWeb;
use App\Models\Kelas;
use App\Models\Pembayaran;
use App\Models\Siswa;
use App\Models\TahunAjaran;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public $pages = 'Manajemen Laporan';

    public function indexPerSiswa()
    {
        $logo = identitasWeb::first()->logo;
        return view('pages.admin.laporan.persiswa.index', ["pages" => $this->pages, "logo" => $logo]);
    }

    public function indexPerKelas()
    {
        $logo = identitasWeb::first()->logo;
        return view('pages.admin.laporan.perkelas.index', ["pages" => $this->pages, "logo" => $logo]);
    }

    public function indexKeuangan()
    {
        $logo = identitasWeb::first()->logo;
        return view('pages.admin.laporan.keuangan.index', ["pages" => $this->pages, "logo" => $logo]);
    }

    public function downloadLaporanPerSiswa()
    {
        $data_pembayaran = Pembayaran::join("detail_pembayaran", function ($join) {
            $join->on("pembayaran.id", "=", "detail_pembayaran.pembayaran_id")
                ->where("pembayaran.nisn", "=", session("selected_siswa"))
                ->where("pembayaran.thn_ajaran", "=", session("selected_thn_ajaran"));
        })
            ->rightJoin("view_daftar_bulan", "view_daftar_bulan.bulan", "=", "detail_pembayaran.bln_bayar")
            ->get();;

        $data_siswa = Siswa::where("nisn", "=", session("selected_siswa"))->first();

        $nominal_spp = TahunAjaran::where("thn_ajaran", session("selected_thn_ajaran"))->first()->jumlah_spp;

        $total_terbayar = 0;
        $total_belum_terbayar = 0;
        foreach ($data_pembayaran as $value) {
            if ($value->no_pembayaran) {
                if ($value->status == "Success") {
                    $total_terbayar += $value->tahunAjaran->jumlah_spp;
                } else {
                    $total_belum_terbayar += $value->tahunAjaran->jumlah_spp;
                }
            } else {
                $total_belum_terbayar += $nominal_spp;
            }
        }

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
            "total_terbayar" => $total_terbayar,
            "total_belum_terbayar" => $total_belum_terbayar
        ]);

        $pdf->setOption('isHtml5ParserEnabled', true);
        $pdf->setOption('isPhpEnabled', true);
        return $pdf->stream();
    }

    public function downloadLaporanPerKelas()
    {

        $data_siswa = Siswa::where("kelas_id", "=", session("selected_kelas"))->get();
        $kelas = Kelas::where("id", "=", session("selected_kelas"))->first()->kode_kelas;
        $identitas_web = identitasWeb::first();

        $nominal_spp = TahunAjaran::where("thn_ajaran", session("selected_thn_ajaran"))->first()->jumlah_spp;

        //simpan data pembayaran sesuai NISN ke dalam Array
        $data = [];
        foreach ($data_siswa as $key => $value) {
            $data[] = [
                "siswa" => $value->nama,
                "pembayaran" => $this->collectDataPembayaran($value->nisn, session("selected_thn_ajaran")),
                "nominal_spp" => $nominal_spp,
                "rekap_bayar" => $this->getRekapPembayaran($value->nisn, session("selected_thn_ajaran"), $nominal_spp)
            ];
        }

        //simpan data siswa dan pembayaran dalam format JSON
        $data_json = json_encode($data, true);

        $pdf = Pdf::loadView("livewire.admin.laporan.laporan-perkelas-pdf", ["data" => $data_json, "kelas" => $kelas, "thn_ajaran" => session("selected_thn_ajaran"), "identitas_web" => $identitas_web]);

        $pdf->setOption('isHtml5ParserEnabled', true);
        $pdf->setPaper([0, 0, 595.28, 1241.89], "landscape");
        $pdf->setOption('isPhpEnabled', true);
        return $pdf->stream();
    }

    public function downloadLaporanKeuangan()
    {
        $data_pembayaran = session("data_pembayaran");
        $identitas_web = identitasWeb::first();

        //hitung grand total
        $grand_total = 0;
        foreach ($data_pembayaran as $key => $value) {
            $grand_total += $value['total'];
        }

        $pdf = Pdf::loadView("livewire.admin.laporan.laporan-keuangan-pdf", compact("data_pembayaran", "grand_total", "identitas_web"));

        $pdf->setOption('isHtml5ParserEnabled', true);
        $pdf->setPaper("A4", "landscape");
        $pdf->setOption('isPhpEnabled', true);

        return $pdf->stream();
    }

    private function collectDataPembayaran($nisn, $selected_thn_ajaran)
    {
        return Pembayaran::join("detail_pembayaran", function ($join) use ($nisn, $selected_thn_ajaran) {
            $join->on("pembayaran.id", "=", "detail_pembayaran.pembayaran_id")
                ->where("pembayaran.nisn", "=", $nisn)
                ->where("pembayaran.thn_ajaran", "=", $selected_thn_ajaran);
        })
            ->rightJoin("view_daftar_bulan", "view_daftar_bulan.bulan", "=", "detail_pembayaran.bln_bayar")
            ->get();
    }

    private function getRekapPembayaran($nisn, $selected_thn_ajaran, $nominal_spp)
    {
        $data_pembayaran = $this->collectDataPembayaran($nisn, $selected_thn_ajaran);

        $total_terbayar = 0;
        $total_belum_terbayar = 0;
        foreach ($data_pembayaran as $value) {
            if ($value->no_pembayaran) {
                if ($value->status == "Success") {
                    $total_terbayar += $value->tahunAjaran->jumlah_spp;
                } else {
                    $total_belum_terbayar += $value->tahunAjaran->jumlah_spp;
                }
            } else {
                $total_belum_terbayar += $nominal_spp;
            }
        }

        return [
            "total_terbayar" => $total_terbayar,
            "total_belum_terbayar" => $total_belum_terbayar
        ];
    }
}
