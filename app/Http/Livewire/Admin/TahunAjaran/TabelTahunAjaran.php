<?php

namespace App\Http\Livewire\Admin\TahunAjaran;

use App\Models\TahunAjaran;
use Livewire\Component;

class TabelTahunAjaran extends Component
{
    public $listeners = ["deleteAct" => 'delete']; //property untuk menangkap event dari emit component lain / dari frontend (js) secara global

    public function delete($id)
    {
        $tahunAjaran = TahunAjaran::find($id);

        if ($tahunAjaran) {
            $tahunAjaran->delete();
        }
    }

    public function render()
    {
        $tahun_ajaran = TahunAjaran::all();
        return view('livewire.admin.tahun-ajaran.tabel-tahun-ajaran', compact('tahun_ajaran'));
    }
}
