<?php

namespace App\Http\Livewire\Admin\Kelas;

use App\Models\Kelas;
use Livewire\Component;

class TabelKelas extends Component
{
    public $id_kelas;
    public $listeners = ["deleteAct" => 'delete']; //property untuk menangkap event dari emit component lain / dari frontend (js) secara global

    public function delete($value)
    {
        $kelas = Kelas::find($value);
        if ($kelas) {
            $kelas->delete();
        }
    }

    public function render()
    {
        $kelas = Kelas::all();
        return view('livewire.admin.kelas.tabel-kelas', compact("kelas"));
    }
}
