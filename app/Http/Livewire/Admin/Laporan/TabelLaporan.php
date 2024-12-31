<?php

namespace App\Http\Livewire\Admin\Laporan;

use App\Http\Controllers\Admin\LaporanController;
use App\Models\Kelas;
use App\Models\Pembayaran;
use App\Models\Siswa;
use App\Models\TahunAjaran;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Livewire\Component;

class TabelLaporan extends Component
{
    public $data_thn_ajaran = [], $data_kelas = [], $data_siswa = [], $data_pembayaran = [];

    //property untuk menangkap data tahun ajaran, kelas, dan siswa yang dipilih
    public $selected_thn_ajaran, $selected_kelas, $selected_siswa;

    public $nominal_spp;
    public $thn_ajaran_awal, $thn_ajaran_akhir;

    //property untuk menangkap event dari emit component lain / dari frontend (js) secara global
    public $listeners = [
        "changeSelectedSiswa" => "SelectedSiswa",
    ];

    public function mount()
    {
        $this->data_thn_ajaran = TahunAjaran::orderBy("thn_ajaran", "asc")->get();
        $this->data_kelas = Kelas::orderBy("kode_kelas", "asc")->get();
    }

    //method menangani logika ketika pilihan kelas di ubah
    public function updatedSelectedKelas()
    {
        $this->selected_siswa = null;
        //mengecek property yang diupdate / diganti
        $this->collectDataSiswa($this->selected_kelas, $this->selected_thn_ajaran);

        if ($this->selected_siswa == null) {
            $this->data_pembayaran = null;
        }
    }

    //method untuk menyimpan data siswa yang dipilih (karena pakai lib select2)
    public function SelectedSiswa($data)
    {
        $this->selected_siswa = $data;
        $this->collectDataPembayaran($this->selected_siswa);
    }

    //method menangani logika ketika pilihan tahun ajaran di ubah
    public function updatedSelectedThnAjaran()
    {
        $tahunAjaran = TahunAjaran::where("thn_ajaran", $this->selected_thn_ajaran)->first();
        $this->nominal_spp = $tahunAjaran->jumlah_spp;

        // Pecah nilai tahun ajaran yang dipilih menjadi tahun mulai dan tahun akhir
        list($startYear, $endYear) = explode('/', $this->selected_thn_ajaran);
        $this->thn_ajaran_awal = $startYear;
        $this->thn_ajaran_akhir = $endYear;
        // $this->selected_siswa = null;

        if ($this->selected_siswa) {
            $this->collectDataPembayaran($this->selected_siswa);
        } else {
            $this->data_pembayaran = null;
        }

        // $this->collectDataSiswa($this->selected_kelas, $this->selected_thn_ajaran);
    }

    public function downloadPDF()
    {
        session()->put("selected_siswa", $this->selected_siswa);
        session()->put("selected_thn_ajaran", $this->selected_thn_ajaran);

        return redirect()->route("laporan-persiswa.cetak");
    }

    public function render()
    {
        return view('livewire.admin.laporan.tabel-laporan-persiswa');
    }

    //method untuk meremove pilihan saat icon x di klik
    public function rmSelected()
    {
        $this->selected_siswa = null;
        $this->selected_kelas = null;
        $this->selected_thn_ajaran = null;
        $this->data_pembayaran = null;
        $this->data_siswa = null;
    }

    public function getDataPembayaran($nisn)
    {

        $this->collectDataPembayaran($nisn);
        return $this->data_pembayaran;
    }

    private function collectDataSiswa($selected_kelas = null, $selected_thn_ajaran = null)
    {
        $this->data_siswa = Siswa::where("kelas_id", $this->selected_kelas)
            ->get();
    }

    private function setBulanTahun($y, $m)
    {
        $bulanTahun = Carbon::createFromDate($y, $m)->format("M Y");
        return $bulanTahun;
    }

    //method untuk ubah format tanggal
    public function formatDate($date)
    {
        return Carbon::parse($date)->format('d F Y');
    }

    private function collectDataPembayaran($nisn)
    {
        $this->data_pembayaran = Pembayaran::join("detail_pembayaran", function ($join) use ($nisn) {
            $join->on("pembayaran.id", "=", "detail_pembayaran.pembayaran_id")
                ->where("pembayaran.nisn", "=", $nisn)
                ->where("pembayaran.thn_ajaran", "=", $this->selected_thn_ajaran);
        })
            ->rightJoin("view_daftar_bulan", "view_daftar_bulan.bulan", "=", "detail_pembayaran.bln_bayar")
            ->get();
    }
}
