<?php

namespace App\Http\Livewire\Admin\KenaikanKelas;

use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\TahunAjaran;
use Livewire\Component;

class TabelKenaikanKelas extends Component
{
    // property save filter kelas dan tahun ajaran yang dipilih untuk diupdate
    public $selected_kelas, $selected_thn_ajaran, $search;
    // property untuk save pilihan yang akan diterapkan diseluruh data
    public $pick_all_kelas;
    //property untuk menyimpan data kelas , data siswa dan tahun ajaran
    public $data_kelas, $data_thn_ajaran, $data_siswa;
    // property save id siswa yang akan diupdate datanya
    public $id_siswa = [];
    // property save data kelas baru dan tahun ajaran baru (fitur filter)
    public $kelas_baru = [], $thn_ajaran_baru;

    public function mount()
    {
        //set data kelas dan tahun ajaran untuk pembaharuan
        $this->data_kelas = Kelas::all();
        $this->data_thn_ajaran = TahunAjaran::all();
    }

    //method untuk memperbaharui data property search sesuai nilai yang diinput (lifecycle updated)
    public function updatedSearch()
    {
        $this->collectDataSiswa();
    }

    //method untuk memperbaharui data property selected_kelas  sesuai nilai yang dipilih (lifecycle updated)
    public function updatedSelectedKelas()
    {
        $this->collectDataSiswa();
    }

    //method untuk memperbaharui data property selected_thn_ajaran  sesuai nilai yang dipilih (lifecycle updated)
    public function updatedSelectedThnAjaran()
    {
        $this->collectDataSiswa();
    }

    // method untuk mengset kelas ke seluruh data sesuai kelas yang dipilih (lifecycle updated)
    public function updatedPickAllKelas()
    {
        $this->setAllKelas();
    }

    public function rmSelected()
    {
        $this->selected_kelas = null;
        $this->selected_thn_ajaran = null;

        $this->collectDataSiswa();
    }

    public function update()
    {
        $this->validate([
            "kelas_baru" => "required",
            "thn_ajaran_baru" => "required",
        ]);

        try {
            foreach ($this->kelas_baru as $id_siswa => $id_kelas) {
                Siswa::find($id_siswa)->update([
                    "kelas_id" => $id_kelas,
                    "thn_ajaran" => $this->thn_ajaran_baru,
                ]);
            }

            return redirect()->route("kenaikan-kelas")->with("status", "success")->with("msg", "Data berhasil diupdate");
        } catch (\Exception $e) {
            return redirect()->route("kenaikan-kelas")->with("status", "error")->with("msg", $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.admin.kenaikan-kelas.tabel-kenaikan-kelas');
    }

    private function collectDataSiswa()
    {
        if ($this->selected_kelas != null && $this->selected_thn_ajaran != null && $this->search != null) {
            $this->data_siswa = Siswa::where("kelas_id", $this->selected_kelas)
                ->where("thn_ajaran", $this->selected_thn_ajaran)
                ->where(function ($query) {
                    $query->orWhere("nama", "like", "%" . $this->search . "%")
                        ->orWhere("nisn", "like", "%" . $this->search . "%");
                })
                ->get();
        } elseif ($this->selected_kelas != null && $this->selected_thn_ajaran != null && $this->search == null) {
            $this->data_siswa = Siswa::where("kelas_id", $this->selected_kelas)
                ->where("thn_ajaran", $this->selected_thn_ajaran)
                ->get();
        } elseif ($this->selected_kelas == null && $this->selected_thn_ajaran == null && $this->search != null) {
            $this->data_siswa = Siswa::Where("nama", "like", "%" . $this->search . "%")
                ->orWhere("nisn", "like", "%" . $this->search . "%")
                ->get();
        } else {
            $this->data_siswa = null;
        }
    }

    private function setAllKelas()
    {
        foreach ($this->data_siswa as $key => $value) {
            $this->kelas_baru[$value->id] = $this->pick_all_kelas;
        }
    }
}
