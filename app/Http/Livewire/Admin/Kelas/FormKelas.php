<?php

namespace App\Http\Livewire\Admin\Kelas;

use App\Models\Kelas;
use Livewire\Component;

class FormKelas extends Component
{
    public $kode_kelas;
    public $kelas;

    public function mount($kelas)
    {
        // menampilkan data kode_kelas untuk edit form
        $this->kode_kelas = ($kelas != "") ? $kelas->kode_kelas : null;
        $this->kelas = $kelas;
    }

    public function store()
    {
        $validate = $this->validate([
            "kode_kelas" => "required"
        ]);

        $kelas = Kelas::create($this->all());

        if ($kelas) {
            return redirect()->route("kelas.index")->with("status", "success");
        }
    }

    public function update($id)
    {
        $validate = $this->validate([
            "kode_kelas" => "required"
        ]);

        $kelas = Kelas::find($id);
        $kelas->kode_kelas = $this->kode_kelas;
        $kelas->save();

        if ($kelas) {
            return redirect()->route("kelas.index")->with("status", "success");
        }
    }

    public function render()
    {
        return view('livewire.admin.kelas.form-kelas');
    }
}
