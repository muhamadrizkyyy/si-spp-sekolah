<?php

namespace App\Http\Livewire\Admin\Jurusan;

use App\Models\Jurusan;
use Livewire\Component;

class TabelJurusan extends Component
{
    public $listeners = ["deleteAct" => 'delete']; //property untuk menangkap event dari emit component lain / dari frontend (js) secara global

    public function delete($value)
    {
        $jurusan = Jurusan::find($value);
        if ($jurusan) {
            $jurusan->delete();

            $this->emit("initDataTable");
        }
    }

    public function render()
    {
        $jurusan = Jurusan::all();
        return view('livewire.admin.jurusan.tabel-jurusan', compact('jurusan'));
    }
}
