<?php

namespace App\Http\Livewire\Admin\Siswa;

use App\Models\Siswa;
use Livewire\Component;

class TabelSiswa extends Component
{
    public function delete($id)
    {
        $siswa = Siswa::find($id);
        if ($siswa) {
            $siswa->delete();
        }
    }

    public function render()
    {
        $siswa = Siswa::all();
        return view('livewire.admin.siswa.tabel-siswa', compact("siswa"));
    }
}
