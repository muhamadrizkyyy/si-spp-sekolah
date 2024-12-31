<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use App\Models\Pembayaran;
use App\Models\Siswa;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public $pages = 'Manajemen Laporan';

    public function indexPerSiswa()
    {
        return view('pages.admin.laporan.persiswa.index', ["pages" => $this->pages]);
    }

    public function indexPerKelas()
    {
        return view('pages.admin.laporan.perkelas.index', ["pages" => $this->pages]);
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

        // Pecah nilai tahun ajaran yang dipilih menjadi tahun mulai dan tahun akhir
        list($startYear, $endYear) = explode('/', session("selected_thn_ajaran"));
        $thn_ajaran_awal = $startYear;
        $thn_ajaran_akhir = $endYear;

        $pdf = Pdf::loadView("livewire.admin.laporan.laporan-pdf", [
            "data_pembayaran" => $data_pembayaran,
            "data_siswa" => $data_siswa,
            "thn_ajaran" => session("selected_thn_ajaran"),
            "thn_ajaran_awal" => $thn_ajaran_awal,
            "thn_ajaran_akhir" => $thn_ajaran_akhir
        ]);

        $pdf->setOption('isHtml5ParserEnabled', true);
        $pdf->setOption('isPhpEnabled', true);
        return $pdf->stream();
    }

    public function downloadLaporanPerKelas()
    {

        $data_siswa = Siswa::where("kelas_id", "=", session("selected_kelas"))->get();
        $kelas = Kelas::where("id", "=", session("selected_kelas"))->first()->kode_kelas;

        //simpan data pembayaran sesuai NISN ke dalam Array
        $data = [];
        foreach ($data_siswa as $key => $value) {
            $data[] = [
                "siswa" => $value->nama,
                "pembayaran" => $this->collectDataPembayaran($value->nisn, session("selected_thn_ajaran"))
            ];
        }

        //simpan data siswa dan pembayaran dalam format JSON
        $data_json = json_encode($data, true);

        $pdf = Pdf::loadView("livewire.admin.laporan.laporan-perkelas-pdf", ["data" => $data_json, "kelas" => $kelas, "thn_ajaran" => session("selected_thn_ajaran")]);

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
}
