<?php

namespace App\Http\Livewire\Admin\Laporan;

use App\Models\DetailPembayaran;
use App\Models\Pembayaran;
use Carbon\Carbon;
use Livewire\Component;

class TabelLaporanKeuangan extends Component
{
    public $data_pembayaran;
    protected $query_data_pembayaran;

    //property untuk menangkap data yang dipilih
    public $selected_filter = null, $start_date, $end_date;

    public function mount()
    {
        //hapus session filter dan data pembayaran sebelumnya
        if (session()->has("filter") && session()->has("data_pembayaran")) {
            session()->forget(["filter", "data_pembayaran"]);
        }

        $query_data_pembayaran = Pembayaran::where("status", "Success");
        $data_pembayaran = $query_data_pembayaran->get();
        $this->collectDataPembayaran($data_pembayaran);
    }

    public function updatedSelectedFilter()
    {
        $query_data_pembayaran = Pembayaran::where("status", "Success");
        if ($this->selected_filter === "D-day") {
            session()->put("filter", [
                $this->selected_filter,
                now()->format('Y-m-d')
            ]);
            $data_pembayaran = $query_data_pembayaran->whereDate("pembayaran.tgl_bayar", now()->format('Y-m-d'))->get();
        } else if ($this->selected_filter === "week") {
            session()->put("filter", [
                $this->selected_filter,
                now()->startOfWeek()->format('Y-m-d'),
                now()->endOfWeek()->format('Y-m-d')
            ]);
            $data_pembayaran = $query_data_pembayaran->whereBetween("pembayaran.tgl_bayar", [now()->startOfWeek(), now()->endOfWeek()])->get();
        } else if ($this->selected_filter === "month") {
            session()->put("filter", [
                $this->selected_filter,
                Carbon::createFromDate(now()->year, now()->month)->format("F Y")
            ]);
            $data_pembayaran = $query_data_pembayaran->whereMonth("pembayaran.tgl_bayar", now()->month)->get();
        } else if ($this->selected_filter === "year") {
            session()->put("filter", [
                $this->selected_filter,
                now()->year
            ]);
            $data_pembayaran = $query_data_pembayaran->whereYear('pembayaran.tgl_bayar', now()->year)->get();
        } else {
            $this->selected_filter = null;
            $data_pembayaran = $query_data_pembayaran->get();
        }

        $this->collectDataPembayaran($data_pembayaran);
    }

    public function updated($propertyName)
    {
        if ($propertyName === 'start_date' || $propertyName === 'end_date') {
            if ($this->start_date && $this->end_date) {
                session()->put("filter", [
                    "rangeDate",
                    $this->start_date,
                    $this->end_date
                ]);
                $query_data_pembayaran = Pembayaran::where("status", "Success");
                $data_pembayaran = $query_data_pembayaran->whereBetween("pembayaran.tgl_bayar", [$this->start_date, $this->end_date])->get();
                $this->collectDataPembayaran($data_pembayaran);
            }
        }
    }

    public function downloadPDF()
    {
        session()->put("data_pembayaran", $this->data_pembayaran);
        return redirect()->route("laporan-keuangan.cetak");
    }

    public function render()
    {
        return view('livewire.admin.laporan.tabel-laporan-keuangan');
    }

    public function rmSelected()
    {
        $this->selected_filter = null;
        $this->start_date = null;
        $this->end_date = null;

        //hapus session filter
        session()->forget("filter");

        $query_data_pembayaran = Pembayaran::where("status", "Success");
        $data_pembayaran = $query_data_pembayaran->get();
        $this->collectDataPembayaran($data_pembayaran);
    }

    public function getGrandTotal()
    {
        $grand_total = 0;
        foreach ($this->data_pembayaran as $key => $value) {
            $grand_total += $value['total'];
        }

        return $grand_total;
    }

    private function collectDataPembayaran($data_pembayaran)
    {
        $data = $data_pembayaran->map(function ($item) {
            $detail_pembayaran = DetailPembayaran::where("pembayaran_id", $item->id)->get();

            $bulan = collect();

            // Pecah nilai tahun ajaran yang dipilih menjadi tahun mulai dan tahun akhir
            list($startYear, $endYear) = explode('/', $item->thn_ajaran);
            $thn_ajaran_awal = $startYear;
            $thn_ajaran_akhir = $endYear;


            foreach ($detail_pembayaran as $value) {
                if ($value->bln_bayar > 5) {
                    $bulan->push($this->setBulanTahun($thn_ajaran_awal, $value->bln_bayar));
                } else {
                    $bulan->push($this->setBulanTahun($thn_ajaran_akhir, $value->bln_bayar));
                }
            }

            return [
                "no_pembayaran" => $item->no_pembayaran,
                "nama_siswa" => $item->siswaBayar->nama,
                "thn_ajaran" => $item->thn_ajaran,
                "bulan" => $bulan->all(),
                "total" => $item->total_bayar,
                "tgl_bayar" => date("d-m-Y", strtotime($item->tgl_bayar)),
            ];
        });


        $this->data_pembayaran = $data;
    }

    private function setBulanTahun($y, $m)
    {

        $bulanTahun = Carbon::createFromDate($y, $m)->format("F Y");

        return $bulanTahun;
    }
}
