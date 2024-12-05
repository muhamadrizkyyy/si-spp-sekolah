<?php

namespace App\Http\Livewire\Admin\Jurusan;

use App\Models\Jurusan;
use Livewire\Component;

class TabelJurusan extends Component
{
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
