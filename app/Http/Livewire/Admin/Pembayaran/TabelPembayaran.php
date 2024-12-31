<?php

namespace App\Http\Livewire\Admin\Pembayaran;

use App\Models\DetailPembayaran;
use App\Models\Kelas;
use App\Models\Pembayaran;
use App\Models\Siswa;
use App\Models\TahunAjaran;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class TabelPembayaran extends Component
{
    public $data_thn_ajaran, $data_kelas, $data_siswa, $data_pembayaran = [];

    //property untuk menangkap data tahun ajaran, kelas, dan siswa yang dipilih
    public $selected_thn_ajaran, $selected_kelas, $selected_siswa;

    //property untuk menangkap event dari emit component lain / dari frontend (js) secara global
    public $listeners = [
        "changeSelectedSiswa" => "SelectedSiswa",
        "SelectedThnAjaranFirst" => "updatedSelectedThnAjaran",
    ];

    //property untuk menyimpan data pembayaran baru
    public $pickBulan = []; //property untuk menyimpan indeks bulan yang akan dibayar
    public $nominal_spp;
    public $total_bayar_spp;

    //property untuk ambil tahun ajaran awal dan akhir
    public $thn_ajaran_awal, $thn_ajaran_akhir;

    public function mount()
    {
        $this->data_thn_ajaran = TahunAjaran::orderBy("thn_ajaran", "asc")->get();
        $this->data_kelas = Kelas::orderBy("kode_kelas", "asc")->get();

        foreach ($this->data_thn_ajaran as $key => $item) {
            if (Carbon::now()->format("Y") == explode("/", $item->thn_ajaran)[0]) {
                $this->selected_thn_ajaran = $item->thn_ajaran;
            }
        }
    }

    //method menangani logika ketika pilihan kelas di ubah
    public function updatedSelectedKelas()
    {
        $this->selected_siswa = null;
        //mengecek property yang diupdate / diganti
        $this->collectDataSiswa();

        if ($this->selected_siswa == null) {
            $this->data_pembayaran = null;
        }
    }

    //method menangani logika ketika memilih bulan yang akan dibayar
    public function updatedPickBulan()
    {
        $this->collectDataPembayaran();
        $this->total_bayar_spp = $this->nominal_spp * count($this->pickBulan);
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

        if ($this->selected_siswa) {
            $this->collectDataPembayaran();
        }
    }

    //method untuk menyimpan data siswa yang dipilih (karena pakai lib select2)
    public function SelectedSiswa($data)
    {
        $this->selected_siswa = $data;

        $this->collectDataPembayaran();
    }

    public function bayar()
    {
        try {
            DB::transaction(function () {
                $pembayaran = new Pembayaran();
                $pembayaran->no_pembayaran = "00" . random_int(100, 999) . Carbon::now()->format("dmY") . random_int(10, 99);
                $pembayaran->tgl_bayar = Carbon::now()->format("Y-m-d");
                $pembayaran->nisn = $this->selected_siswa;
                $pembayaran->jmlh_bulan = count($this->pickBulan);
                $pembayaran->total_bayar = $this->total_bayar_spp;
                $pembayaran->status = "Success";
                $pembayaran->user_id = Auth::id();
                $pembayaran->metode_pembayaran = "CSH";
                $pembayaran->thn_ajaran = $this->selected_thn_ajaran;
                $pembayaran->save();

                foreach ($this->pickBulan as $bulan) {
                    DetailPembayaran::create([
                        "bln_bayar" => $bulan,
                        "pembayaran_id" => $pembayaran->id,
                    ]);
                }

                // $this->emit("showAlert", "success", "Pembayaran berhasil dilakukan");
                return redirect()->route("pembayaran")->with("status", "success")->with("msg", "Pembayaran berhasil dilakukan");
            });
        } catch (\Throwable $th) {
            // $this->emit("showAlert", "error", "Pembayaran Gagal : " . $th->getMessage());
            return redirect()->route("pembayaran")->with("status", "error")->with("msg", "Pembayaran gagal dilakukan (" . $th->getMessage() . ")");
        }
    }

    public function render()
    {
        return view('livewire.admin.pembayaran.tabel-pembayaran');
    }

    private function collectDataSiswa()
    {
        $this->data_siswa = Siswa::where("kelas_id", $this->selected_kelas)->get();
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

    private function collectDataPembayaran()
    {
        $this->data_pembayaran = Pembayaran::join("detail_pembayaran", function ($join) {
            $join->on("pembayaran.id", "=", "detail_pembayaran.pembayaran_id")
                ->where("pembayaran.nisn", "=", $this->selected_siswa)
                ->where("pembayaran.thn_ajaran", "=", $this->selected_thn_ajaran);
        })
            ->rightJoin("view_daftar_bulan", "view_daftar_bulan.bulan", "=", "detail_pembayaran.bln_bayar")
            ->get();
    }
}
