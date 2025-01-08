<?php

namespace App\Http\Livewire\Siswa\MenuPembayaran;

use App\Models\Pembayaran;
use App\Models\Siswa;
use App\Models\TahunAjaran;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;
use Livewire\Component;

class TabelMenuPembayaran extends Component
{
    public $data_thn_ajaran, $data_siswa, $data_pembayaran = [];
    public $selected_thn_ajaran; //property untuk menyimpan tahun ajaran yang dipilih
    public $nisn;

    //property untuk menyimpan data pembayaran baru
    public $pickBulan = []; //property untuk menyimpan indeks bulan yang akan dibayar
    public $nominal_spp;
    public $total_bayar_spp;

    //property untuk ambil tahun ajaran awal dan akhir
    public $thn_ajaran_awal, $thn_ajaran_akhir;

    public function mount($id_siswa = null)
    {
        $this->data_siswa = Siswa::find($id_siswa);
        $this->nisn = $this->data_siswa->nisn;

        $selected_thn_ajaran = $this->data_siswa->thn_ajaran_masuk;

        $this->data_thn_ajaran = TahunAjaran::where("thn_ajaran", ">=", $selected_thn_ajaran)->orderBy("thn_ajaran", "asc")->get();

        // $this->collectDataPembayaran($this->nisn);
    }

    public function updatedPickBulan()
    {
        $this->collectDataPembayaran($this->nisn);
        $this->total_bayar_spp = $this->nominal_spp * count($this->pickBulan);
    }

    //method menangani logika ketika pilihan tahun ajaran di ubah
    public function updatedSelectedThnAjaran()
    {
        $this->pickBulan = [];
        if ($this->selected_thn_ajaran) {
            $tahunAjaran = TahunAjaran::where("thn_ajaran", $this->selected_thn_ajaran)->first();
            $this->nominal_spp = $tahunAjaran->jumlah_spp;
        }

        // Pecah nilai tahun ajaran yang dipilih menjadi tahun mulai dan tahun akhir
        list($startYear, $endYear) = explode('/', $this->selected_thn_ajaran);
        $this->thn_ajaran_awal = $startYear;
        $this->thn_ajaran_akhir = $endYear;
        $this->collectDataPembayaran($this->nisn);
    }

    public function bayar()
    {
        $this->collectDataPembayaran($this->nisn);

        session()->put("pickBulan", $this->pickBulan);
        session()->put("nominal_spp", $this->nominal_spp);
        session()->put("total_bayar_spp", $this->total_bayar_spp);
        session()->put("thn_ajaran_awal", $this->thn_ajaran_awal);
        session()->put("thn_ajaran_akhir", $this->thn_ajaran_akhir);
        Redirect::route("detail-pembayaran.siswa");
    }

    public function render()
    {
        return view('livewire.siswa.menu-pembayaran.tabel-menu-pembayaran');
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
