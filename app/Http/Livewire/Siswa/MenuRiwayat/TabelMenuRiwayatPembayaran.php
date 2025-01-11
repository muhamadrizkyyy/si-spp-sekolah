<?php

namespace App\Http\Livewire\Siswa\MenuRiwayat;

use App\Models\Pembayaran;
use App\Models\Siswa;
use App\Models\TahunAjaran;
use Carbon\Carbon;
use Livewire\Component;

class TabelMenuRiwayatPembayaran extends Component
{
    public $data_thn_ajaran = [], $data_pembayaran = [], $data_siswa;

    //property untuk menangkap data tahun ajaran yang dipilih
    public $selected_thn_ajaran;

    public $nisn;
    public $nominal_spp;
    public $thn_ajaran_awal, $thn_ajaran_akhir;

    public function mount($nisn = null)
    {
        $this->data_siswa = Siswa::where("nisn", $nisn)->first();
        $this->nisn = $this->data_siswa->nisn;

        $selected_thn_ajaran = $this->data_siswa->thn_ajaran_masuk;

        $this->data_thn_ajaran = TahunAjaran::where("thn_ajaran", ">=", $selected_thn_ajaran)->orderBy("thn_ajaran", "asc")->get();
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
        $this->collectDataPembayaran($this->nisn);
    }

    public function downloadPDF()
    {
        $this->collectDataPembayaran($this->nisn);
        session()->put("selected_siswa", $this->nisn);
        session()->put("selected_thn_ajaran", $this->selected_thn_ajaran);

        return redirect()->route("riwayat-pembayaran.cetak");
    }

    public function render()
    {
        return view('livewire.siswa.menu-riwayat.tabel-menu-riwayat-pembayaran');
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
