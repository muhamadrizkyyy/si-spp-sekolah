<?php

namespace App\Http\Livewire\Siswa\MenuRiwayat;

use App\Models\Pembayaran;
use App\Models\Siswa;
use App\Models\TahunAjaran;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class TabelMenuRiwayatPembayaran extends Component
{
    use WithPagination;

    // Set pagination theme to Tailwind (default)
    protected $paginationTheme = 'tailwind';

    public $data_thn_ajaran = [], $data_siswa;

    //property untuk menangkap data yang dipilih
    public $selected_thn_ajaran, $selected_filter = null, $start_date, $end_date;

    public $nisn;
    public $thn_ajaran_awal, $thn_ajaran_akhir;

    public function mount($nisn = null)
    {
        $this->data_siswa = Siswa::where("nisn", $nisn)->first();
        $this->nisn = $nisn;

        $selected_thn_ajaran = $this->data_siswa->thn_ajaran_masuk;

        $this->data_thn_ajaran = TahunAjaran::where("thn_ajaran", ">=", $selected_thn_ajaran)->orderBy("thn_ajaran", "asc")->get();
    }

    public function updated($propertyName)
    {
        if ($propertyName === "start_date" || $propertyName === "end_date") {
            if ($this->start_date && $this->end_date) {
                $this->collectDataPembayaran("rangeDate");
            }
        }
    }

    //method menangani logika ketika pilihan tahun ajaran di ubah
    public function updatedSelectedThnAjaran()
    {
        $tahunAjaran = TahunAjaran::where("thn_ajaran", $this->selected_thn_ajaran)->first();

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

    public function rmSelected()
    {
        $this->selected_filter = null;
        $this->start_date = null;
        $this->end_date = null;
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

    // private function collectDataPembayaran($nisn)
    // {
    //     $this->data_pembayaran = Pembayaran::join("detail_pembayaran", function ($join) use ($nisn) {
    //         $join->on("pembayaran.id", "=", "detail_pembayaran.pembayaran_id")
    //             ->where("pembayaran.nisn", "=", $nisn)
    //             ->where("pembayaran.thn_ajaran", "=", $this->selected_thn_ajaran);
    //     })
    //         ->rightJoin("view_daftar_bulan", "view_daftar_bulan.bulan", "=", "detail_pembayaran.bln_bayar")
    //         ->get();
    // }

    private function collectDataPembayaran($filter = null)
    {
        if ($filter == "D-day") {
            $Dday = now()->format("Y-m-d");
            $data_pembayaran = Pembayaran::where("nisn", $this->nisn)
                ->where("tgl_bayar", $Dday)->orderBy("id", "desc")->paginate(5);
        } else if ($filter == "month") {
            $month = now()->format("m");
            $data_pembayaran = Pembayaran::where("nisn", $this->nisn)
                ->whereMonth("tgl_bayar", $month)->orderBy("id", "desc")->paginate(5);
        } else if ($filter == "year") {
            $year = now()->format("Y");
            $data_pembayaran = Pembayaran::where("nisn", $this->nisn)
                ->whereYear("tgl_bayar", $year)->orderBy("id", "desc")->paginate(5);
        } else if ($filter == "rangeDate") {
            $data_pembayaran = Pembayaran::whereBetween("tgl_bayar", [$this->start_date, $this->end_date])->where("nisn", $this->nisn)->orderBy("id", "desc")->paginate(2);
        } else {
            $data_pembayaran = Pembayaran::where("nisn", $this->nisn)->orderBy("id", "desc")->paginate(5);
        }

        return $data_pembayaran;
    }
}
